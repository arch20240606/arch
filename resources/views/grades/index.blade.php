@extends('layouts.app')

@section('title'){{ trans('app.m_ocenka') }} - {{ trans('app.site_title') }}@endsection

<?php
if (app()->getLocale() == "ru") {
  $names = 'name_ru';
} elseif (app()->getLocale() == "en") {
  $names = 'name_en';
} else {
  $names = 'name_kz';
}
?>

@section('header')
@include ('layouts.header')
@endsection

@section('content')
<main class="content">

  <div class="container">

    <div class="breadcrumbs">
      <a class="breadcrumbs__home" href="/">
        <svg>
          <use xlink:href="/assets/images/sprite.svg#house"></use>
        </svg>
      </a>
      /
      <a href="{{ route('grades.index') }}">{{ trans('app.grade') }}</a>
    </div>

    <h1 class="page-title">Просмотр результатов оценки по годам</h1>


    <form class="filter form" method="POST" action="{{ route('grades.store') }}">
      @csrf
      <div class="filter__type form__field">
        <div style="margin-left: 22px; padding-bottom: 5px; font-weight: 600; font-size: 14px;">Выберите год</div>
        <select name="search_year">
          <option value="2022" @if($search_year=='2022' ) selected @endif>2022</option>
          <option value="2021" @if($search_year=='2021' ) selected @endif>2021</option>
          <option value="2020" @if($search_year=='2020' ) selected @endif>2020</option>
        </select>
      </div>
      <div class="filter__type form__field">
        <div style="margin-left: 22px; padding-bottom: 5px; font-weight: 600; font-size: 14px;">Выберите МИО либо ЦГО</div>
        <select name="search_type">
          <option value="mio" @if($search_type=='mio' ) selected @endif>МИО</option>
          <option value="cgo" @if($search_type=='cgo' ) selected @endif>ЦГО</option>
        </select>
      </div>
      <div class="filter__type form__field">
        <div style="margin-left: 22px; padding-bottom: 5px; font-weight: 600; font-size: 14px;"> &nbsp; </div>
        <button class="budget-order__submit btn btn_icon" type="submit" name="show_mio_year">Показать</button>
      </div>
    </form>

    <table class="table">
      <thead>
        <tr>
          <th style="text-align: center; max-width: 20px;">Позиция</th>
          <th>Государственный орган</th>
          <th>Итоговый балл</th>
          <th>Год</th>
        </tr>
      </thead>
      <tbody>

        @foreach ($grades as $grade)
        @php
        $years = 'total_'.$search_year;
        @endphp
        <tr>
          <td style="text-align: center;">{{ $loop->iteration }}</td>
          <td class="table__name"><a href="#">{{ $grade->$names }}</a></td>
          <td class="table__status">{{ sprintf("%.2f", $grade->$years) }}</td>
          <td class="table__status">{{ $search_year }}</td>
        </tr>
        @endforeach


      </tbody>
    </table>







    <div class="chart" style="padding: 0px;">
      <div class="chart__title">Итоговый балл</div>
      <div class="chart__block" style="padding: 40px;">
        
        <div class="chart__y">
          <span>100</span>
          <span>75</span>
          <span>50</span>
          <span>25</span>
          <span>0</span>
        </div>
        
        <div class="chart__x">

          @foreach ($grades as $grade)
            <?php
            $array_bg = array ("#00317B", "#1A4689", "#335A95", "#4D6FA3" ,"#5C7EB1" ,"#A0AEC0" ,"#E3E5EC" ,"#E3E5EC" ,"#E3E5EC" ,"#E3E5EC" ,"#E3E5EC" ,"#E3E5EC" ,"#E3E5EC" ,"#E3E5EC" ,"#E3E5EC" ,"#E3E5EC" ,"#E3E5EC" ,"#E3E5EC" ,"#E3E5EC" ,"#E3E5EC" ,"#E3E5EC" ,"#E3E5EC" ,"#E3E5EC" ,"#E3E5EC" ,"#E3E5EC");
            $years = 'total_'.$search_year;
            ?>
             
            <div class="chart__item">
              <span class="chart__bar" style='text-align: center; height: {{ sprintf("%.0f", $grade->$years) }}%; background: {{ $array_bg[$loop->index] }}'>
                <span style="font-size: 12px; position: relative; z-index: +10; top: -25px;">{{ sprintf("%.2f", $grade->$years) }}</span>
              </span>
              <span class="chart__label">{{ $grade->abbr_ru }}</span>
            </div>
            

          @endforeach



        </div>
      </div>
    </div>




    <div class="chart__title" style="color:black; font-size: 22px;">Просмотр результатов оценки по государственному органу</div>

    <form class="filter form" style="margin-bottom: 0px;" method="POST" action="{{ route('grades.store') }}">
      @csrf

      <div class="filter__type form__field">
        <div style="margin-left: 22px; padding-bottom: 5px; font-weight: 600; font-size: 14px;">Выберите МИО либо ЦГО</div>
        <select name="go_type">
          <option value="mio" selected>МИО</option>
          <option value="cgo">ЦГО</option>
        </select>
      </div>

      <div class="filter__type form__field" style="max-width: 700px;">
        <div style="margin-left: 22px; padding-bottom: 5px; font-weight: 600; font-size: 14px;">Выберите наименование ГО</div>
        <select name="go_name" id="go_name">
          @foreach ($gos as $go)
            
            <option data-type="{{ $go->type }}" value="{{ $go->total_2020 }}, {{ $go->total_2021 }}, {{ $go->total_2022 }} ">{{ $go->$names }}</option>
            
          @endforeach
        </select>
      </div>

    </form>

    <canvas id="chart" class="chart__block" style="max-height: 400px; padding-bottom: 0px;"></canvas>


  </div>

</main>
@endsection



@section('footer')
@include ('layouts.footer')
@endsection


@section('other_divs')
@include ('layouts.ask_question')
@endsection


@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  
  var selectGo = document.getElementById("go_name");
  var selectTypeGo = document.getElementById("go_type");
  var ctx = document.getElementById('chart');


 

  document.addEventListener('DOMContentLoaded', () => {
    var yearParam = selectGo.value;
    const years = yearParam.split(',');
    var year_2020 = years[0];
    var year_2021 = years[1];
    var year_2022 = years[2];
    
    var chartData = {
        labels: ['2020', '2021', '2022'],
        datasets: [{
            data: [year_2020, year_2021, year_2022],
            pointRadius: 10,
            pointHoverRadius: 14,
            pointBorderColor: 'rgba(255, 255, 255, 1)',
            pointBorderWidth: 2,
            borderWidth: 6,
            borderColor: 'rgba(0, 117, 255, 1)',
            backgroundColor: 'rgba(0, 117, 255, 1)',
            tension: 0.4,
            fill: {
                target: 'origin',
                above: 'rgba(0, 117, 255, 0.2)'
            }
        }]
    };
    var chartOptions = {
        plugins: {
            legend: {
                display: false
            }
        },
        animations: {
            tension: {
                duration: 25,
                easing: 'ease-in-out',
                from: 0.8,
                to: 0.4,
                loop: false
            }
        },
        layout: {
            padding: {
                top: 0,
                right: 0,
                bottom: 0,
                left: 0
            }
        },
        scales: {
            x: {
                grid: {
                    color: 'rgba(0, 117, 255, 0.2)',
                    tickLength: 1,
                },
                ticks: {
                    font: {
                        family: 'Montserrat',
                        weight: 500,
                        size: 16
                    },
                    padding: 35,
                    color: 'rgba(0, 49, 123, 0.5)',
                }
            },
            y: {
                suggestedMin: 0,
                suggestedMax: 100,
                grid: {
                    color: 'rgba(0, 117, 255, 0.2)',
                    tickWidth: 0
                },
                ticks: {
                    stepSize: 20,
                    font: {
                        family: 'Montserrat',
                        weight: 500,
                        size: 16
                    },
                    padding: 29,
                    color: 'rgba(0, 49, 123, 0.5)',
                    callback: (value) => {
                        return value;
                    }
                }
            }
        }
    };
    
    chart = new Chart(ctx, {
      type: 'line',
      data: chartData,
      options: chartOptions
    });




    





    selectGo.addEventListener('change', function() {
      
      var yearParam = selectGo.value;
      const years = yearParam.split(',');
      var year_2020 = years[0];
      var year_2021 = years[1];
      var year_2022 = years[2];

      var chartData = {
          labels: ['2020', '2021', '2022'],
          datasets: [{
              data: [year_2020, year_2021, year_2022],
              pointRadius: 10,
              pointHoverRadius: 14,
              pointBorderColor: 'rgba(255, 255, 255, 1)',
              pointBorderWidth: 2,
              borderWidth: 6,
              borderColor: 'rgba(0, 117, 255, 1)',
              backgroundColor: 'rgba(0, 117, 255, 1)',
              tension: 0.4,
              fill: {
                  target: 'origin',
                  above: 'rgba(0, 117, 255, 0.2)'
              }
          }]
      };

      var chartOptions = {
        plugins: {
            legend: {
                display: false
            }
        },
        animations: {
            tension: {
                duration: 25,
                easing: 'ease-in-out',
                from: 0.8,
                to: 0.4,
                loop: false
            }
        },
        layout: {
            padding: {
                top: 0,
                right: 0,
                bottom: 0,
                left: 0
            }
        },
        scales: {
            x: {
                grid: {
                    color: 'rgba(0, 117, 255, 0.2)',
                    tickLength: 1,
                },
                ticks: {
                    font: {
                        family: 'Montserrat',
                        weight: 500,
                        size: 16
                    },
                    padding: 35,
                    color: 'rgba(0, 49, 123, 0.5)',
                }
            },
            y: {
                suggestedMin: 0,
                suggestedMax: 100,
                grid: {
                    color: 'rgba(0, 117, 255, 0.2)',
                    tickWidth: 0
                },
                ticks: {
                    stepSize: 20,
                    font: {
                        family: 'Montserrat',
                        weight: 500,
                        size: 16
                    },
                    padding: 29,
                    color: 'rgba(0, 49, 123, 0.5)',
                    callback: (value) => {
                        return value;
                    }
                }
            }
        }
      };

      if (chart) {
        chart.destroy();
        chart = new Chart(ctx, {
          type: 'line',
          data: chartData,
          options: chartOptions
        });
      } else {
        chart = new Chart(ctx, {
          type: 'line',
          data: chartData,
          options: chartOptions
        });
      }

    });















    selectTypeGo.addEventListener('change', function() {


    });

   












  });


  

</script>
@endsection