@extends('layouts.app')

@section('title'){{ trans('app.is_cgo') }} - {{ trans('app.site_title') }}@endsection

<?php
if ( $infosys->wholeClass != "" ) {
  if ( $infosys->wholeClass == "LOW_PRIORITY_APPLICATION_SOFTWARE" ) {
    $class = "Класс 3 - Малоприоритетное ПО";
  } 
  elseif ($infosys->wholeClass == "MEDIUM_PRIORITY_APPLICATION_SOFTWARE") {
    $class = "Класс 2 - Среднеприоритетное ПО";
  } 
  elseif ($infosys->wholeClass == "HIGH_PRIORITY_APPLICATION_SOFTWARE'") {
    $class = "Класс 1 - Высокоприоритетное ПО";
  } 
  else {
    $class = "Класс не определен";
  }
} else {
  $class = "Класс не определен";
}


if ($infosys->bpStatus == "draft") {
  $status_is = "Черновик";
} elseif ($infosys->bpStatus == "archive") {
  $status_is = "Архивная";
} elseif ($infosys->bpStatus == "published") {
  $status_is = "Зарегистрирован";
} else {
  $status_is = "Нет данных";
}


?>

@section('header')
@include ('layouts.header')
@endsection

@section('content')
<main class="content">
  
  <section class="geo" style="height: 170px;">
    <div class="geo__bg">
      <picture>
        <source srcset="/assets/images/questions-bg.avif" type="image/avif">
        <source srcset="/assets/images/questions-bg.webp" type="image/webp">
        <img src="/assets/images/questions-bg.jpg" alt="Background">
      </picture>
    </div>

    <div class="container">
      <h1 class="page-title" style="padding-top: 50px;">Подробная информация</h1>
    </div>
  </section>


  <div class="container" style="margin-top: 20px;">

    <div class="buttons-wrapper">
      <a class="btn btn_white" onclick="history.back()">← Назад</a>
    </div>



    <div class="is-info">
      <div class="is-info__header">
        <h2 class="is-info__header-title">{{ $infosys->name }}</h2>
      </div>
      <div class="is-info__body">
        <div class="is-info__left is-info__col">
          <div class="is-info__row" style="background: #F3F8FA;">
            <p><b>Наименование</b></p>
            <p>{{ $infosys->name }}</p>
          </div>
          <div class="is-info__row" style="background: rgba(243, 248, 250, 0.30);">
            <p><b>Старый ID</b></p>
            <p class="value value_yellow">{{ $infosys->_id }}</p>
          </div>
          <div class="is-info__row" style="background: rgba(243, 248, 250, 0.30);">
            <p><b>Процент наполнения</b></p>
            <p class="value value_green">{{ $infosys->filledPercentage }}%</p>
          </div>
          <div class="is-info__row" style="background: rgba(243, 248, 250, 0.30);">
            <p><b>Текущий статус системы</b></p>
            <p>{{ $status_is }}</p>
          </div>
          <div class="is-info__row" style="background: rgba(243, 248, 250, 0.30);">
            <p><b>Характеристика</b></p>
            <p><b>Оценка</b></p>
          </div>
          <div class="is-info__row">
            <p>Охват:</p>
            
            <?php
            if( $infosys->coverage != 'null' ) {
              if ( json_decode($infosys->coverage)->{'textValue'} == "HIGH" ) {
                $val_coverage = "value_green";
                $str_coverage = "Высокий";
              } elseif ( json_decode($infosys->coverage)->{'textValue'} == "MEDIUM" ) {
                $val_coverage = "value_yellow";
                $str_coverage = "Высокий";
              } else {
                $val_coverage = "";
                $str_coverage = "Низкий";
              }
              $score_coverage = sprintf("%.2f", json_decode($infosys->coverage)->{'score'} );
            } else {
              $val_coverage = "";
              $str_coverage = "Нет данных";
              $score_coverage = "0.00";
            }
            ?>

            <p class="value {{ $val_coverage }}">{{ $score_coverage }}</p>
            <p class="value {{ $val_coverage }}">{{ $str_coverage }}</p>
          </div>
          <div class="is-info__row">
            <p>Сложность:</p>

            <?php
            if( $infosys->complexity != 'null' ) {
              if ( json_decode($infosys->complexity)->{'textValue'} == "HIGH" ) {
                $val_complexity = "value_green";
                $str_complexity = "Высокий";
              } elseif ( json_decode($infosys->complexity)->{'textValue'} == "MEDIUM" ) {
                $val_complexity = "value_yellow";
                $str_complexity = "Высокий";
              } else {
                $val_complexity = "";
                $str_complexity = "Низкий";
              }
              $score_complexity = sprintf("%.2f", json_decode($infosys->complexity)->{'score'} );
            } else {
              $val_complexity = "";
              $str_complexity = "Нет данных";
              $score_complexity = "0.00";
            }
            ?>

            <p class="value {{ $val_complexity }}">{{ $score_complexity }}</p>
            <p class="value {{ $val_complexity }}">{{ $str_complexity }}</p>
          </div>
          <div class="is-info__row">
            <p>Критичность:</p>

            <?php
            if( $infosys->criticality != 'null' ) {
              if ( json_decode($infosys->criticality)->{'textValue'} == "HIGH" ) {
                $val_criticality = "value_green";
                $str_criticality = "Высокий";
              } elseif ( json_decode($infosys->criticality)->{'textValue'} == "MEDIUM" ) {
                $val_criticality = "value_yellow";
                $str_criticality = "Средний";
              } else {
                $val_criticality = "";
                $str_criticality = "Низкий";
              }
              $score_criticality = sprintf("%.2f", json_decode($infosys->criticality)->{'score'} );
            } else {
              $val_criticality = "";
              $str_criticality = "Нет данных";
              $score_criticality = "0.00";
            }
            ?>

            <p class="value {{ $val_criticality }}">{{ $score_criticality }}</p>
            <p class="value {{ $val_criticality }}">{{ $str_criticality }}</p>
          </div>
          <div class="is-info__row">
            <p>Ценность:</p>

            <?php
            if( $infosys->valuation != 'null' ) {
              if ( json_decode($infosys->valuation)->{'textValue'} == "HIGH" ) {
                $val_valuation = "value_green";
                $str_valuation = "Высокий";
              } elseif ( json_decode($infosys->valuation)->{'textValue'} == "MEDIUM" ) {
                $val_valuation = "value_yellow";
                $str_valuation = "Средний";
              } else {
                $val_valuation = "";
                $str_valuation = "Низкий";
              }
              $score_valuation = sprintf("%.2f", json_decode($infosys->valuation)->{'score'} );
            } else {
              $val_valuation = "";
              $str_valuation = "Нет данных";
              $score_valuation = "0.00";
            }
            ?>

            <p class="value {{ $val_valuation }}">{{ $score_valuation }}</p>
            <p class="value {{ $val_valuation }}">{{ $str_valuation }}</p>
          </div>
          <div class="is-info__row" style="background: #F3F8FA;">
            <p><b>Предварительный уровень класса</b></p>
            <span class="status status_edit">{{ $class }}</span>
          </div>
        </div>


        <div class="is-info__right is-info__col">

          <div class="is-info__row" style="background: #F3F8FA;">
            <p><b>Регистрационный номер</b></p>
            <p>{{ $infosys->regNumber }}</p>
          </div>

          <div class="is-info__row" style="background: rgba(243, 248, 250, 0.30);">
            <p><b>Владелец</b></p>
            <p>
            <?php
            if ( isset( $infosys->getGO($infosys->ownerId)->name ) ) {
              echo $infosys->getGO($infosys->ownerId)->name;
            } else {
              echo "Нет информации";
            }
            ?>
            </p>
          </div>

          <div class="is-info__row" style="background: rgba(243, 248, 250, 0.30);">
            <p><b>Статус <span style="color: #FF6A97">*</span></b></p>
            <p>
              @if ($infosys->status == "5cf4c17ce8912824cdc2cb70") 
                Не функционирует
              @elseif ($infosys->status == "5cf4c175e8912824cdc2cb6f") 
                Функционирует
              @else
                Нет данных
              @endif
            </p>
          </div>

          <div class="is-info__row" style="background: rgba(243, 248, 250, 0.30);">
            <p><b>Статус подтверждения системы</b></p>
            <p>Подтверждено</p>
          </div>

          <div class="is-info__row" style="background: rgba(243, 248, 250, 0.30);">
            <p><b>Аббревиатура</b></p>
            <p>{{ $infosys->AppShortName }}</p>
          </div>
        
          <div class="is-info__row" style="background: rgba(243, 248, 250, 0.30);">
            <p><b>Назначение</b></p>
            <p>{{ $infosys->AppDescription }}</p>
          </div>

          <div class="is-info__row" style="background: rgba(243, 248, 250, 0.30);">
            <p><b>Версия</b></p>
            <p>{{ $infosys->version }}</p>
          </div>

          <div class="is-info__row" style="background: rgba(243, 248, 250, 0.30);">
            <p><b>Дата начала жизненного цикла</b></p>
            <p>{{ date( 'd.m.Y', strtotime($infosys->startVersionDateTime) ) }}</p>
          </div>

          <div class="is-info__row" style="background: rgba(243, 248, 250, 0.30);">
            <p><b>Дата окончания жизненного цикла</b></p>
            <p>{{ date( 'd.m.Y', strtotime($infosys->endVersionDateTime) ) }}</p>
          </div>


          <div class="is-info" style="width: 100%; background: rgba(243, 248, 250, 0.30);">

            <div class="is-checkboxes" style="width: 100%; padding-left: 20px;">
              <label class="toggle-checkbox">
                <input disabled type="checkbox" @if ( $infosys->available_on_the_ETS_GO == "true" ) checked @endif>
                <span></span>
                <p>Доступен в ЕТС ГО</p>
              </label>
              <label class="toggle-checkbox">
                <input disabled type="checkbox" @if( $infosys->available_on_the_LAN == "true") checked @endif>
                <span></span>
                <p>Доступен в ЛВС</p>
              </label>
              <label class="toggle-checkbox">
                <input disabled type="checkbox" @if( $infosys->Internet_access == "true") checked @endif>
                <span></span>
                <p>Доступен в Интернет</p>
              </label>
              <label class="toggle-checkbox">
                <input disabled type="checkbox" @if( $infosys->is_transboundary == "true") checked @endif>
                <span></span>
                <p>Трансграничный</p>
              </label>
              <label class="toggle-checkbox">
                <input disabled type="checkbox" @if( $infosys->available_on_the_IP_VPN == "true") checked @endif>
                <span></span>
                <p>Доступен через ip/vpn</p>
              </label>
            </div>

          </div>





        </div>



      </div>
    </div>









  </div>

</main>
@endsection



@section('footer')
@include ('layouts.footer')
@endsection


@section('other_divs')

@endsection