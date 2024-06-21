<div class="info-box-error" id="error_sign_box" style="display: none; margin-bottom: 5px;"></div>
<div class="success-info" id="success_sign_box" style="display: none; margin-bottom: 5px;"></div>


<h2 class="is-content-title">Форма создания комментариев или заключения</h2>
<select id="conSelect" style="margin-bottom: 24px; padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
  <option selected>Выберите</option>
  <?php if(auth()->user()->hasAnyRole(['ROLE_SI_EXPERTISE_REVIEWER', 'ROLE_SI_EXPERTISE_CONFIRMER', 'ROLE_SI_EXPERTISE_SIGNER'])): ?>
      <option value="СИ">СИ</option>
  <?php endif; ?>
  <?php if(auth()->user()->hasAnyRole(['ROLE_GTS_EXPERTISE_REVIEWER', 'ROLE_GTS_EXPERTISE_CONFIRMER', 'ROLE_GTS_EXPERTISE_SIGNER'])): ?>
      <option value="ГТС">ГТС</option>
      <option value="СИ">СИ</option>
  <?php endif; ?>
  <?php if(auth()->user()->hasAnyRole(['ROLE_UO_EXPERTISE_REVIEWER', 'ROLE_UO_EXPERTISE_CONFIRMER', 'ROLE_UO_EXPERTISE_SIGNER','ROLE_GO_EXPERTISE_EDITOR'])): ?>
      <option value="УО">УО</option>
      <option value="ГТС">ГТС</option>
      <option value="СИ">СИ</option>
  <?php endif; ?>
</select>

<div>
  <button id="editButton" style="padding: 10px; margin-bottom: 10px;">Редактировать</button>
  <button style="padding: 10px; margin-bottom: 10px;" id="exportButton">Экспорт заключения</button>
</div>
<nav class="is-tabs tabs" style="border: 1px solid black">
  <a style="width: 25%; font-size: 16px; color:black" class="tabs__link" href="#" data-id="5">Написать</a>
</nav>

<form class="form" method="POST" action="<?php echo e(route('expertise.store')); ?>">
  <?php echo csrf_field(); ?>
  <input type="hidden" name="expertise_id" id="expertise_id" value="<?php echo e($expertise->id); ?>">
 

  <?php $__currentLoopData = $conclusions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $concl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

  <div class="conclusion_si" style="display: none;">
    <div style="padding: 20px; border: 1px solid #ccc; border-radius: 10px; margin-bottom: 20px;">
        <div style="display: flex; align-items: center;">
            <p style="margin-right: 20px; color: #666;">Результат СИ:</p>
            <select id="status_concl" name="status_concl" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;" disabled>
                <option value="Выберите статус" <?php echo e($concl->status_concl == 'Выберите статус' ? 'selected' : ''); ?>>Выберите статус</option>
                <option value="На доработку" <?php echo e($concl->status_concl == 'На доработку' ? 'selected' : ''); ?>>На доработку</option>
                <option value="Положительно" <?php echo e($concl->status_concl == 'Положительно' ? 'selected' : ''); ?>>Положительно</option>
                <option value="Отрицательно" <?php echo e($concl->status_concl == 'Отрицательно' ? 'selected' : ''); ?>>Отрицательно</option>
                <option value="Условно-положительное (данное заключение будет являться положительным при условии устранения представленных замечаний)" <?php echo e($concl->status_concl == 'Условно-положительное (данное заключение будет являться положительным при условии устранения представленных замечаний)' ? 'selected' : ''); ?>>Условно-положительное (данное заключение будет являться положительным при условии устранения представленных замечаний)</option>
            </select>
        </div>
    </div>

    <div class="conclusion_si" style="display: none;">
      <div style="padding: 20px; border: 1px solid #ccc; border-radius: 10px; margin-bottom: 20px;">
        <p><b style="font-size: 18px; color: #333;">1. Документы, представленные на рассмотрение</b></p>
        <hr style="border-top: 2px solid #333; margin: 10px 0;">
        <div style="display: flex; align-items: center;">
          <p style="margin-right: 20px; color: #666;">Перечень документов</p>
          <textarea class="editable" name="concl_1" id="concl_1" readonly style="margin-left: 105px; width: 700px; height: 100px; border: 1px solid #ccc;"><?php echo e($concl->concl_1); ?></textarea>
        </div>
      </div>
    </div>

    <div class="conclusion_si" style="display: none;">
      <div style="padding: 20px; border: 1px solid #ccc; border-radius: 10px; margin-bottom: 20px;">
        <p><b style="font-size: 18px; color: #333;">2. Документы, принятые во внимание при рассмотрении</b></p>
        <hr style="border-top: 2px solid #333; margin: 10px 0;">
        <div style="display: flex; align-items: center;">
            <p style="margin-right: 20px; color: #666;">Перечень документов</p>
            <textarea class="editable" name="concl_2" id="concl_2" readonly style="margin-left: 105px; width: 700px; height: 100px; border: 1px solid #ccc;"><?php echo e($concl->concl_2); ?></textarea>
        </div>
      </div>
    </div>

    <div class="conclusion_si" style="display: none;">
      <div style="padding: 20px; border: 1px solid #ccc; border-radius: 10px; margin-bottom: 20px;">
        <p><b style="font-size: 18px; color: #333;">3. Используемые сокращения</b></p>
        <hr style="border-top: 2px solid #333; margin: 10px 0;">
        <div style="display: flex; align-items: center;">
            <p style="margin-right: 20px; color: #666;">Перечень сокращений</p>
            <textarea class="editable" name="concl_3" id="concl_3" readonly style="margin-left: 105px; width: 700px; height: 100px; border: 1px solid #ccc;"><?php echo e($concl->concl_3); ?></textarea>
        </div>
      </div>
    </div>

    <div class="conclusion_si" style="display: none;">
      <div style="padding: 20px; border: 1px solid #ccc; border-radius: 10px; margin-bottom: 20px;">
          <p><b style="font-size: 18px;">4.1. Проверка раздела «Назначение и цели создания (развития) системы»</b></p>
          <hr style="border-top: 2px solid #333;">
          <div style="display: flex; align-items: center; margin-bottom: 10px;">
              <p style="margin-right: 20px; font-size: 16px; flex: 1; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Общие сведения</p>
              <select name="concl_4" id="concl_4" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer; width: 200px;" disabled>
                  <option value="Имеется" <?php echo e($concl->concl_4 == 'Имеется' ? 'selected' : ''); ?>>Имеется</option>
                  <option value="Отсутствует" <?php echo e($concl->concl_4 == 'Отсутствует' ? 'selected' : ''); ?>>Отсутствует</option>
                  <option value="Не требуется" <?php echo e($concl->concl_4 == 'Не требуется' ? 'selected' : ''); ?>>Не требуется</option>
              </select>
          </div>

        <hr style="border-top: 2px solid #333;">
        <div style="display: flex; align-items: center; margin-bottom: 10px;">
            <p style="margin-right: 20px; font-size: 16px; flex: 1; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Назначение системы</p>
            <select name="concl_5" id="concl_5" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer; width: 200px;" disabled>
                <option value="Имеется" <?php echo e($concl->concl_5 == 'Имеется' ? 'selected' : ''); ?>>Имеется</option>
                <option value="Отсутствует" <?php echo e($concl->concl_5 == 'Отсутствует' ? 'selected' : ''); ?>>Отсутствует</option>
                <option value="Не требуется" <?php echo e($concl->concl_5 == 'Не требуется' ? 'selected' : ''); ?>>Не требуется</option>
            </select>
        </div>

          <hr style="border-top: 2px solid #333;">
          <div style="display: flex; align-items: center; margin-bottom: 10px;">
            <p style="margin-right: 20px; font-size: 16px; flex: 1; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Цели создания системы</p>
            <select name="concl_6" id="concl_6" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer; width: 200px;" disabled>
                <option value="Имеется" <?php echo e($concl->concl_6 == 'Имеется' ? 'selected' : ''); ?>>Имеется</option>
                <option value="Отсутствует" <?php echo e($concl->concl_6 == 'Отсутствует' ? 'selected' : ''); ?>>Отсутствует</option>
                <option value="Не требуется" <?php echo e($concl->concl_6 == 'Не требуется' ? 'selected' : ''); ?>>Не требуется</option>
            </select>
          </div>
        </div>
      </div>

    <div class="conclusion_si" style="display: none;">
      <div style="padding: 20px; border: 1px solid #ccc; border-radius: 10px; margin-bottom: 20px;">
        <p><b style="font-size: 18px;">4.2 Проверка раздела «Характеристика объектов автоматизации»</b></p>
        <hr style="border-top: 2px solid #333;">
        <div style="display: flex; align-items: center; margin-bottom: 10px;">
            <p style="margin-right: 900px; font-size: 16px; flex: 1;">Состав объектов автоматизации</p>
            <select name="concl_7" id="concl_7" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer; width: 200px;" disabled>
                <option value="Имеется" <?php echo e($concl->concl_7 == 'Имеется' ? 'selected' : ''); ?>>Имеется</option>
                <option value="Отсутствует" <?php echo e($concl->concl_7 == 'Отсутствует' ? 'selected' : ''); ?>>Отсутствует</option>
                <option value="Не требуется" <?php echo e($concl->concl_7 == 'Не требуется' ? 'selected' : ''); ?>>Не требуется</option>
            </select>
        </div>
        <hr style="border-top: 2px solid #333;">
        <div style="display: flex; align-items: center; margin-bottom: 10px;">
            <p style="margin-right: 900px; font-size: 16px; flex: 1;">Структура объектов автоматизации</p>
            <select name="concl_8" id="concl_8" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer; width: 200px;" disabled>
                <option value="Имеется" <?php echo e($concl->concl_8 == 'Имеется' ? 'selected' : ''); ?>>Имеется</option>
                <option value="Отсутствует" <?php echo e($concl->concl_8 == 'Отсутствует' ? 'selected' : ''); ?>>Отсутствует</option>
                <option value="Не требуется" <?php echo e($concl->concl_8 == 'Не требуется' ? 'selected' : ''); ?>>Не требуется</option>
            </select>
        </div>
        <hr style="border-top: 2px solid #333;">
        <div style="display: flex; align-items: center; margin-bottom: 10px;">
            <p style="margin-right: 900px; font-size: 16px; flex: 1;">Описание объектов автоматизации</p>
            <select name="concl_9" id="concl_9" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer; width: 200px;" disabled disabled>
                <option value="Имеется" <?php echo e($concl->concl_9 == 'Имеется' ? 'selected' : ''); ?>>Имеется</option>
                <option value="Отсутствует" <?php echo e($concl->concl_9 == 'Отсутствует' ? 'selected' : ''); ?>>Отсутствует</option>
                <option value="Не требуется" <?php echo e($concl->concl_9 == 'Не требуется' ? 'selected' : ''); ?>>Не требуется</option>
            </select>
        </div>
      </div>
    </div>

    <div class="conclusion_si" style="display: none;">
      <div style="padding: 20px; border: 1px solid #ccc; border-radius: 10px; margin-bottom: 20px;">
        <p><b style="font-size: 18px;">4.3 Проверка раздела «Сведения о выделенных подсистемах»</b></p>
        <hr style="border-top: 2px solid #333;">
        <div style="display: flex; align-items: center; margin-bottom: 10px;">
            <p style="margin-right: 900px; font-size: 16px; flex: 1;">Описание каждой подсистемы в отдельности, их цели, задачи, структура</p>
            <select name="concl_10" id="concl_10" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer; width: 200px;" disabled>
                <option value="Имеется" <?php echo e($concl->concl_10 == 'Имеется' ? 'selected' : ''); ?>>Имеется</option>
                <option value="Отсутствует" <?php echo e($concl->concl_10 == 'Отсутствует' ? 'selected' : ''); ?>>Отсутствует</option>
                <option value="Не требуется" <?php echo e($concl->concl_10 == 'Не требуется' ? 'selected' : ''); ?>>Не требуется</option>
            </select>
        </div>
        <hr style="border-top: 2px solid #333;">
        <div style="display: flex; align-items: center; margin-bottom: 10px;">
            <p style="margin-right: 900px; font-size: 16px; flex: 1;">Взаимодействие подсистем между собой</p>
            <select name="concl_11" id="concl_11" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer; width: 200px;" disabled>
                <option value="Имеется" <?php echo e($concl->concl_11 == 'Имеется' ? 'selected' : ''); ?>>Имеется</option>
                <option value="Отсутствует" <?php echo e($concl->concl_11 == 'Отсутствует' ? 'selected' : ''); ?>>Отсутствует</option>
                <option value="Не требуется" <?php echo e($concl->concl_11 == 'Не требуется' ? 'selected' : ''); ?>>Не требуется</option>
            </select>
        </div>
        <hr style="border-top: 2px solid #333;">
        <div style="display: flex; align-items: center; margin-bottom: 10px;">
            <p style="margin-right: 900px; font-size: 16px; flex: 1;">Техническое обеспечение, требуемое для работы подсистемы</p>
            <select name="concl_12" id="concl_12" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer; width: 200px;" disabled>
                <option value="Имеется" <?php echo e($concl->concl_12 == 'Имеется' ? 'selected' : ''); ?>>Имеется</option>
                <option value="Отсутствует" <?php echo e($concl->concl_12 == 'Отсутствует' ? 'selected' : ''); ?>>Отсутствует</option>
                <option value="Не требуется" <?php echo e($concl->concl_12 == 'Не требуется' ? 'selected' : ''); ?>>Не требуется</option>
            </select>
        </div>
      </div>
    <div>

      <div class="conclusion_si" style="display: none;">
        <div style="padding: 20px; border: 1px solid #ccc; border-radius: 10px; margin-bottom: 20px;">
          <p><b style="font-size: 18px;">4.4 Проверка раздела «Основные функции системы»</b></p>
          <hr style="border-top: 2px solid #333;">
          <div style="display: flex; align-items: center; margin-bottom: 10px;">
              <p style="margin-right: 900px; font-size: 16px; flex: 1;">Функции подсистем</p>
              <select name="concl_13" id="concl_13" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer; width: 200px;" disabled>
                  <option value="Имеется" <?php echo e($concl->concl_13 == 'Имеется' ? 'selected' : ''); ?>>Имеется</option>
                  <option value="Отсутствует" <?php echo e($concl->concl_13 == 'Отсутствует' ? 'selected' : ''); ?>>Отсутствует</option>
                  <option value="Не требуется" <?php echo e($concl->concl_13 == 'Не требуется' ? 'selected' : ''); ?>>Не требуется</option>
              </select>
          </div>
      
    
    <hr style="border-top: 2px solid #333;">
    <div style="display: flex; align-items: center; margin-bottom: 10px;">
      <p style="margin-right: 900px; font-size: 16px; flex: 1;">2. Требования к надежности - состав и количественные значения показателей надежности для системы в целом или ее подсистем; - перечень аварийных ситуаций, по которым должны быть регламентированы требования к надежности, и значения соответствующих показателей; - требования к надежности технических средств и программного обеспечения; - требования к методам оценки и контроля показателей надежности на разных стадиях создания системы в соответствии с действующими нормативно-техническими документами.</p>
      <select name="concl_14" id="concl_14" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer; width: 200px;" disabled>
        <option value="Имеется" <?php echo e($concl->concl_14 == 'Имеется' ? 'selected' : ''); ?>>Имеется</option>
        <option value="Отсутствует" <?php echo e($concl->concl_14 == 'Отсутствует' ? 'selected' : ''); ?>>Отсутствует</option>
        <option value="Не требуется" <?php echo e($concl->concl_14 == 'Не требуется' ? 'selected' : ''); ?>>Не требуется</option>
      </select>
    </div>
    <hr style="border-top: 2px solid #333;">
    <div style="display: flex; align-items: center; margin-bottom: 10px;">
      <p style="margin-right: 900px; font-size: 16px; flex: 1;">3. Требования безопасности - требования по обеспечению безопасности при монтаже, наладке, эксплуатации, обслуживании и ремонте технических средств системы (защита от воздействий электрического тока, электромагнитных полей, акустических шумов и т. п.), по допустимым уровням освещенности, вибрационных и шумовых нагрузок.</p>
      <select name="concl_15" id="concl_15" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer; width: 200px;" disabled>
        <option value="Имеется" <?php echo e($concl->concl_15 == 'Имеется' ? 'selected' : ''); ?>>Имеется</option>
        <option value="Отсутствует" <?php echo e($concl->concl_15 == 'Отсутствует' ? 'selected' : ''); ?>>Отсутствует</option>
        <option value="Не требуется" <?php echo e($concl->concl_15 == 'Не требуется' ? 'selected' : ''); ?>>Не требуется</option>
      </select>
    </div>
    <hr style="border-top: 2px solid #333;">
    <div style="display: flex; align-items: center; margin-bottom: 10px;">
      <p style="margin-right: 900px; font-size: 16px; flex: 1;">4. Требования к численности и квалификации персонала системы и режиму его работы - требования к численности персонала (пользователей) АС; - требования к квалификации персонала, порядку его подготовки и контроля знаний и навыков; - требуемый режим работы персонала АС.</p>
      <select name="concl_16" id="concl_16" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer; width: 200px;" disabled>
        <option value="Имеется" <?php echo e($concl->concl_16 == 'Имеется' ? 'selected' : ''); ?>>Имеется</option>
        <option value="Отсутствует" <?php echo e($concl->concl_16 == 'Отсутствует' ? 'selected' : ''); ?>>Отсутствует</option>
        <option value="Не требуется" <?php echo e($concl->concl_16 == 'Не требуется' ? 'selected' : ''); ?>>Не требуется</option>
      </select>
    </div>
    <hr style="border-top: 2px solid #333;">
    <div style="display: flex; align-items: center; margin-bottom: 10px;">
      <p style="margin-right: 900px; font-size: 16px; flex: 1;">5. Требования к показателям назначения АС - приводятся значения параметров, характеризующие степень соответствия системы ее назначению. - указывают: степень приспособляемости системы к изменению процессов и методов управления, к отклонениям параметров объекта управления; допустимые пределы модернизации и развития системы; вероятностно-временные характеристики, при которых сохраняется целевое назначение системы.</p>
      <select name="concl_17" id="concl_17" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer; width: 200px;" disabled>
        <option value="Имеется" <?php echo e($concl->concl_17 == 'Имеется' ? 'selected' : ''); ?>>Имеется</option>
        <option value="Отсутствует" <?php echo e($concl->concl_17 == 'Отсутствует' ? 'selected' : ''); ?>>Отсутствует</option>
        <option value="Не требуется" <?php echo e($concl->concl_17 == 'Не требуется' ? 'selected' : ''); ?>>Не требуется</option>
      </select>
    </div>
    <hr style="border-top: 2px solid #333;">
    <div style="display: flex; align-items: center; margin-bottom: 10px;">
      <p style="margin-right: 900px; font-size: 16px; flex: 1;">6. Требования к эргономике и технической эстетике</p>
      <select name="concl_18" id="concl_18" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer; width: 200px;" disabled>
        <option value="Имеется" <?php echo e($concl->concl_18 == 'Имеется' ? 'selected' : ''); ?>>Имеется</option>
        <option value="Отсутствует" <?php echo e($concl->concl_18 == 'Отсутствует' ? 'selected' : ''); ?>>Отсутствует</option>
        <option value="Не требуется" <?php echo e($concl->concl_18 == 'Не требуется' ? 'selected' : ''); ?>>Не требуется</option>
      </select>
    </div>
    <hr style="border-top: 2px solid #333;">
    <div style="display: flex; align-items: center; margin-bottom: 10px;">
      <p style="margin-right: 900px; font-size: 16px; flex: 1;">7. Требования к эксплуатации, техническому обслуживанию, ремонту и хранению компонентов системы - условия и регламент (режим) эксплуатации, которые должны обеспечивать использование технических средств (ТС) системы с заданными техническими показателями, в том числе виды и периодичность обслуживания ТС системы или допустимость работы без обслуживания; - предварительные требования к допустимым площадям для размещения персонала и ТС системы, к параметрам сетей энергоснабжения и т. п.; - требования по количеству, квалификации обслуживающего персонала и режимам его работы; - требования к составу, размещению и условиям хранения комплекта запасных изделий и приборов; - требования к регламенту обслуживания.</p>
      <select name="concl_19" id="concl_19" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer; width: 200px;" disabled>
        <option value="Имеется" <?php echo e($concl->concl_19 == 'Имеется' ? 'selected' : ''); ?>>Имеется</option>
        <option value="Отсутствует" <?php echo e($concl->concl_19 == 'Отсутствует' ? 'selected' : ''); ?>>Отсутствует</option>
        <option value="Не требуется" <?php echo e($concl->concl_19 == 'Не требуется' ? 'selected' : ''); ?>>Не требуется</option>
      </select>
    </div>
    <hr style="border-top: 2px solid #333;">
    <div style="display: flex; align-items: center; margin-bottom: 10px;">
      <p style="margin-right: 900px; font-size: 16px; flex: 1;">8. Требования к защите информации от несанкционированного доступа</p>
      <select name="concl_20" id="concl_20" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer; width: 200px;" disabled>
        <option value="Имеется" <?php echo e($concl->concl_20 == 'Имеется' ? 'selected' : ''); ?>>Имеется</option>
        <option value="Отсутствует" <?php echo e($concl->concl_20 == 'Отсутствует' ? 'selected' : ''); ?>>Отсутствует</option>
        <option value="Не требуется" <?php echo e($concl->concl_20 == 'Не требуется' ? 'selected' : ''); ?>>Не требуется</option>
      </select>
    </div>
    <hr style="border-top: 2px solid #333;">
    <div style="display: flex; align-items: center; margin-bottom: 10px;">
      <p style="margin-right: 900px; font-size: 16px; flex: 1;">9. Требования по сохранности информации при авариях</p>
      <select name="concl_21" id="concl_21" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer; width: 200px;" disabled>
        <option value="Имеется" <?php echo e($concl->concl_21 == 'Имеется' ? 'selected' : ''); ?>>Имеется</option>
        <option value="Отсутствует" <?php echo e($concl->concl_21 == 'Отсутствует' ? 'selected' : ''); ?>>Отсутствует</option>
        <option value="Не требуется" <?php echo e($concl->concl_21 == 'Не требуется' ? 'selected' : ''); ?>>Не требуется</option>
      </select>
    </div>
    <hr style="border-top: 2px solid #333;">
    <div style="display: flex; align-items: center; margin-bottom: 10px;">
      <p style="margin-right: 900px; font-size: 16px; flex: 1;">10. Требования к защите от влияния внешних воздействий - требования к радиоэлектронной защите средств АС; - требования по стойкости, устойчивости и прочности к внешним воздействиям (среде применения).</p>
      <select name="concl_22" id="concl_22" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer; width: 200px;" disabled>
        <option value="Имеется" <?php echo e($concl->concl_22 == 'Имеется' ? 'selected' : ''); ?>>Имеется</option>
        <option value="Отсутствует" <?php echo e($concl->concl_22 == 'Отсутствует' ? 'selected' : ''); ?>>Отсутствует</option>
        <option value="Не требуется" <?php echo e($concl->concl_22 == 'Не требуется' ? 'selected' : ''); ?>>Не требуется</option>
      </select>
    </div>
    <hr style="border-top: 2px solid #333;">
    <div style="display: flex; align-items: center; margin-bottom: 10px;">
      <p style="margin-right: 900px; font-size: 16px; flex: 1;">11. Требования к патентной чистоте</p>
      <select name="concl_23" id="concl_23" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer; width: 200px;" disabled>
        <option value="Имеется" <?php echo e($concl->concl_23 == 'Имеется' ? 'selected' : ''); ?>>Имеется</option>
        <option value="Отсутствует" <?php echo e($concl->concl_23 == 'Отсутствует' ? 'selected' : ''); ?>>Отсутствует</option>
        <option value="Не требуется" <?php echo e($concl->concl_23 == 'Не требуется' ? 'selected' : ''); ?>>Не требуется</option>
      </select>
    </div>
    <hr style="border-top: 2px solid #333;">
    <div style="display: flex; align-items: center; margin-bottom: 10px;">
      <p style="margin-right: 900px; font-size: 16px; flex: 1;">12. Требования по стандартизации и унификации</p>
      <select name="concl_24" id="concl_24" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer; width: 200px;" disabled>
        <option value="Имеется" <?php echo e($concl->concl_24 == 'Имеется' ? 'selected' : ''); ?>>Имеется</option>
        <option value="Отсутствует" <?php echo e($concl->concl_24 == 'Отсутствует' ? 'selected' : ''); ?>>Отсутствует</option>
        <option value="Не требуется" <?php echo e($concl->concl_24 == 'Не требуется' ? 'selected' : ''); ?>>Не требуется</option>
      </select>
    </div>
    
  </div>
</div>

    <div class="conclusion_si" style="display: none;">
      <div style="padding: 20px; border: 1px solid #ccc; border-radius: 10px; margin-bottom: 20px;">
        <p><b>4.4 Проверка подраздела «Требование к функциям (задачам)» раздела «Требования к системе»</b></p>
        <hr style="border-top: 2px solid #333;">
        <div style="display: flex; align-items: center; margin-bottom: 10px;">
          <p style="margin-right: 900px; flex: 1;">Привести по каждой подсистеме перечень функций, задач или их комплексов, подлежащих автоматизации
          </p>
          <select name="concl_25" id="concl_25" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer; width: 200px;" disabled>
            <option value="Имеется" <?php echo e($concl->concl_25 == 'Имеется' ? 'selected' : ''); ?>>Имеется</option>
            <option value="Отсутствует" <?php echo e($concl->concl_25 == 'Отсутствует' ? 'selected' : ''); ?>>Отсутствует</option>
            <option value="Не требуется" <?php echo e($concl->concl_25 == 'Не требуется' ? 'selected' : ''); ?>>Не требуется</option>
          </select>
        </div>

        <hr style="border-top: 2px solid #333;">
        <div style="display: flex; align-items: center; margin-bottom: 10px;">
          <p style="margin-right: 900px; flex: 1;">При создании системы в две или более очереди - перечень функциональных подсистем, отдельных функций или задач, вводимых в действие в 1-й и последующих очередях</p>
          <select name="concl_26" id="concl_26" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer; width: 200px;" disabled>
            <option value="Имеется" <?php echo e($concl->concl_26 == 'Имеется' ? 'selected' : ''); ?>>Имеется</option>
            <option value="Отсутствует" <?php echo e($concl->concl_26 == 'Отсутствует' ? 'selected' : ''); ?>>Отсутствует</option>
            <option value="Не требуется" <?php echo e($concl->concl_26 == 'Не требуется' ? 'selected' : ''); ?>>Не требуется</option>
          </select>
        </div>

        <hr style="border-top: 2px solid #333;">
        <div style="display: flex; align-items: center; margin-bottom: 10px;">
          <p style="margin-right: 900px; flex: 1;">Временной регламент реализации каждой функции, задачи (или комплекса задач)</p>
          <select name="concl_27" id="concl_27" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer; width: 200px;" disabled>
            <option value="Имеется" <?php echo e($concl->concl_27 == 'Имеется' ? 'selected' : ''); ?>>Имеется</option>
            <option value="Отсутствует" <?php echo e($concl->concl_27 == 'Отсутствует' ? 'selected' : ''); ?>>Отсутствует</option>
            <option value="Не требуется" <?php echo e($concl->concl_27 == 'Не требуется' ? 'selected' : ''); ?>>Не требуется</option>
          </select>
        </div>

        <hr style="border-top: 2px solid #333;">
        <div style="display: flex; align-items: center; margin-bottom: 10px;">
          <p style="margin-right: 900px; flex: 1;">Требования к форме представления выходной информации, к качеству реализации исполнения каждой функции (задачи или комплекса задач), характеристики необходимой точности и времени выполнения, требования одновременности выполнения группы функций, достоверности выдачи результатов</p>
          <select name="concl_28" id="concl_28" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer; width: 200px;" disabled>
            <option value="Имеется" <?php echo e($concl->concl_28 == 'Имеется' ? 'selected' : ''); ?>>Имеется</option>
            <option value="Отсутствует" <?php echo e($concl->concl_28 == 'Отсутствует' ? 'selected' : ''); ?>>Отсутствует</option>
            <option value="Не требуется" <?php echo e($concl->concl_28 == 'Не требуется' ? 'selected' : ''); ?>>Не требуется</option>
          </select>
        </div>

        <hr style="border-top: 2px solid #333;">
        <div style="display: flex; align-items: center; margin-bottom: 10px;">
          <p style="margin-right: 900px; flex: 1;">Перечень и критерии отказов для каждой функции, по которой задаются требования по надежности</p>
          <select name="concl_29" id="concl_29" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer; width: 200px;" disabled>
            <option value="Имеется" <?php echo e($concl->concl_29 == 'Имеется' ? 'selected' : ''); ?>>Имеется</option>
            <option value="Отсутствует" <?php echo e($concl->concl_29 == 'Отсутствует' ? 'selected' : ''); ?>>Отсутствует</option>
            <option value="Не требуется" <?php echo e($concl->concl_29 == 'Не требуется' ? 'selected' : ''); ?>>Не требуется</option>
          </select>
        </div>
      </div>    
      <div>

        <div class="conclusion_si" style="display: none;">
          <div style="padding: 20px; border: 1px solid #ccc; border-radius: 10px; margin-bottom: 20px;">
            <p><b>4.5 Проверка подраздела «Требования к видам обеспечения» раздела «Требования к системе»</b></p>
          <hr style="border-top: 2px solid #333;">
          <div style="display: flex; align-items: center; margin-bottom: 10px;">
            <p style="margin-right: 10px; flex: 1;">Требование к математическому обеспечению</p>
            <select name="concl_30" id="concl_30" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer; width: 200px;" disabled>
              <option value="Имеется" <?php echo e($concl->concl_30 == 'Имеется' ? 'selected' : ''); ?>>Имеется</option>
              <option value="Отсутствует" <?php echo e($concl->concl_30 == 'Отсутствует' ? 'selected' : ''); ?>>Отсутствует</option>
              <option value="Не требуется" <?php echo e($concl->concl_30 == 'Не требуется' ? 'selected' : ''); ?>>Не требуется</option>
            </select>
          </div>
  
          <hr style="border-top: 2px solid #333;">
          <div style="display: flex; align-items: center; margin-bottom: 10px;">
            <p style="margin-right: 10px; flex: 1;">Требование к информационному обеспечению</p>
            <select name="concl_31" id="concl_31" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer; width: 200px;" disabled>
              <option value="Имеется" <?php echo e($concl->concl_31 == 'Имеется' ? 'selected' : ''); ?>>Имеется</option>
              <option value="Отсутствует" <?php echo e($concl->concl_31 == 'Отсутствует' ? 'selected' : ''); ?>>Отсутствует</option>
              <option value="Не требуется" <?php echo e($concl->concl_31 == 'Не требуется' ? 'selected' : ''); ?>>Не требуется</option>
            </select>
          </div>
  
          <hr style="border-top: 2px solid #333;">
          <div style="display: flex; align-items: center; margin-bottom: 10px;">
            <p style="margin-right: 10px; flex: 1;">Требование к лингвистическому обеспечению</p>
            <select name="concl_32" id="concl_32" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer; width: 200px;" disabled>
              <option value="Имеется" <?php echo e($concl->concl_32 == 'Имеется' ? 'selected' : ''); ?>>Имеется</option>
              <option value="Отсутствует" <?php echo e($concl->concl_32 == 'Отсутствует' ? 'selected' : ''); ?>>Отсутствует</option>
              <option value="Не требуется" <?php echo e($concl->concl_32 == 'Не требуется' ? 'selected' : ''); ?>>Не требуется</option>
            </select>
          </div>
  
          <hr style="border-top: 2px solid #333;">
          <div style="display: flex; align-items: center; margin-bottom: 10px;">
            <p style="margin-right: 10px; flex: 1;">Требование к программному обеспечению</p>
            <select name="concl_33" id="concl_33" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer; width: 200px;" disabled>
              <option value="Имеется" <?php echo e($concl->concl_33 == 'Имеется' ? 'selected' : ''); ?>>Имеется</option>
              <option value="Отсутствует" <?php echo e($concl->concl_33 == 'Отсутствует' ? 'selected' : ''); ?>>Отсутствует</option>
              <option value="Не требуется" <?php echo e($concl->concl_33 == 'Не требуется' ? 'selected' : ''); ?>>Не требуется</option>
            </select>
          </div>
  
          <hr style="border-top: 2px solid #333;">
          <div style="display: flex; align-items: center; margin-bottom: 10px;">
            <p style="margin-right: 10px; flex: 1;">Требование к техническому обеспечению</p>
            <select name="concl_34" id="concl_34" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer; width: 200px;" disabled>
              <option value="Имеется" <?php echo e($concl->concl_34 == 'Имеется' ? 'selected' : ''); ?>>Имеется</option>
              <option value="Отсутствует" <?php echo e($concl->concl_34 == 'Отсутствует' ? 'selected' : ''); ?>>Отсутствует</option>
              <option value="Не требуется" <?php echo e($concl->concl_34 == 'Не требуется' ? 'selected' : ''); ?>>Не требуется</option>
            </select>
          </div>
  
          <hr style="border-top: 2px solid #333;">
          <div style="display: flex; align-items: center; margin-bottom: 10px;">
            <p style="margin-right: 10px; flex: 1;">Требование к метрологическому обеспечению</p>
            <select name="concl_35" id="concl_35" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer; width: 200px;" disabled>
              <option value="Имеется" <?php echo e($concl->concl_35 == 'Имеется' ? 'selected' : ''); ?>>Имеется</option>
              <option value="Отсутствует" <?php echo e($concl->concl_35 == 'Отсутствует' ? 'selected' : ''); ?>>Отсутствует</option>
              <option value="Не требуется" <?php echo e($concl->concl_35 == 'Не требуется' ? 'selected' : ''); ?>>Не требуется</option>
            </select>
          </div>
  
          <hr style="border-top: 2px solid #333;">
          <div style="display: flex; align-items: center; margin-bottom: 10px;">
            <p style="margin-right: 10px; flex: 1;">Требование к организационному, методическому и другим видам обеспечения системы</p>
            <select name="concl_36" id="concl_36" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer; width: 200px;" disabled>
              <option value="Имеется" <?php echo e($concl->concl_36 == 'Имеется' ? 'selected' : ''); ?>>Имеется</option>
              <option value="Отсутствует" <?php echo e($concl->concl_36 == 'Отсутствует' ? 'selected' : ''); ?>>Отсутствует</option>
              <option value="Не требуется" <?php echo e($concl->concl_36 == 'Не требуется' ? 'selected' : ''); ?>>Не требуется</option>
            </select>
          </div>
        </div>
        <div>

          <div class="conclusion_si" style="display: none;">
            <div style="padding: 20px; border: 1px solid #ccc; border-radius: 10px; margin-bottom: 20px;">
              <p><b>4.6 Проверка раздела «Состав и содержание работ по созданию/модификации системы»</b></p>
              <hr style="border-top: 2px solid #333;">
              <div style="display: flex; align-items: center; margin-bottom: 10px;">
              <p style="margin-right: 900px; flex: 1;">Перечень стадий и этапов работ по созданию системы в соответствии с ГОСТ 34.601, сроки их выполнения, перечень организаций - исполнителей работ, ссылки на документы, подтверждающие согласие этих организаций на участие в создании системы, или запись, определяющую ответственного (заказчик или разработчик) за проведение этих работ</p>
              <select name="concl_37" id="concl_37" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer; width: 200px;" disabled>
                <option value="Имеется" <?php echo e($concl->concl_37 == 'Имеется' ? 'selected' : ''); ?>>Имеется</option>
                <option value="Отсутствует" <?php echo e($concl->concl_37 == 'Отсутствует' ? 'selected' : ''); ?>>Отсутствует</option>
                <option value="Не требуется" <?php echo e($concl->concl_37 == 'Не требуется' ? 'selected' : ''); ?>>Не требуется</option>
              </select>
            </div>
    
            <hr style="border-top: 2px solid #333;">
            <div style="display: flex; align-items: center; margin-bottom: 10px;">
              <p style="margin-right: 900px; flex: 1;">Перечень документов, предъявляемых по окончании соответствующих стадий и этапов работ</p>
              <select name="concl_38" id="concl_38" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer; width: 200px;" disabled>
                <option value="Имеется" <?php echo e($concl->concl_38 == 'Имеется' ? 'selected' : ''); ?>>Имеется</option>
                <option value="Отсутствует" <?php echo e($concl->concl_38 == 'Отсутствует' ? 'selected' : ''); ?>>Отсутствует</option>
                <option value="Не требуется" <?php echo e($concl->concl_38 == 'Не требуется' ? 'selected' : ''); ?>>Не требуется</option>
              </select>
            </div>
    
            <hr style="border-top: 2px solid #333;">
            <div style="display: flex; align-items: center; margin-bottom: 10px;">
              <p style="margin-right: 900px; flex: 1;">Вид и порядок проведения экспертизы технической документации (стадия, этап, объем проверяемой документации, организация-эксперт)</p>
              <select name="concl_39" id="concl_39" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer; width: 200px;" disabled>
                <option value="Имеется" <?php echo e($concl->concl_39 == 'Имеется' ? 'selected' : ''); ?>>Имеется</option>
                <option value="Отсутствует" <?php echo e($concl->concl_39 == 'Отсутствует' ? 'selected' : ''); ?>>Отсутствует</option>
                <option value="Не требуется" <?php echo e($concl->concl_39 == 'Не требуется' ? 'selected' : ''); ?>>Не требуется</option>
              </select>
            </div>
    
            <hr style="border-top: 2px solid #333;">
            <div style="display: flex; align-items: center; margin-bottom: 10px;">
              <p style="margin-right: 900px; flex: 1;">Программа работ, направленных на обеспечение требуемого уровня надежности разрабатываемой системы (при необходимости)</p>
              <select name="concl_40" id="concl_40" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer; width: 200px;" disabled>
                <option value="Имеется" <?php echo e($concl->concl_40 == 'Имеется' ? 'selected' : ''); ?>>Имеется</option>
                <option value="Отсутствует" <?php echo e($concl->concl_40 == 'Отсутствует' ? 'selected' : ''); ?>>Отсутствует</option>
                <option value="Не требуется" <?php echo e($concl->concl_40 == 'Не требуется' ? 'selected' : ''); ?>>Не требуется</option>
              </select>
            </div>
    
            <hr style="border-top: 2px solid #333;">
            <div style="display: flex; align-items: center; margin-bottom: 10px;">
              <p style="margin-right: 900px; flex: 1;">Перечень работ по метрологическому обеспечению на всех стадиях создания системы с указанием их сроков выполнения и организаций-исполнителей (при необходимости)</p>
              <select name="concl_41" id="concl_41" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer; width: 200px;" disabled>
                <option value="Имеется" <?php echo e($concl->concl_41 == 'Имеется' ? 'selected' : ''); ?>>Имеется</option>
                <option value="Отсутствует" <?php echo e($concl->concl_41 == 'Отсутствует' ? 'selected' : ''); ?>>Отсутствует</option>
                <option value="Не требуется" <?php echo e($concl->concl_41 == 'Не требуется' ? 'selected' : ''); ?>>Не требуется</option>
              </select>
            </div>
          </div>
    
          <div style="padding: 20px; border: 1px solid #ccc; border-radius: 10px; margin-bottom: 20px;">
              <p><b>4.7 Проверка раздела «Порядок контроля и приемки системы»</b></p>
            <hr style="border-top: 2px solid #333;">
            <div style="display: flex; align-items: center; margin-bottom: 10px;">
              <p style="margin-right: 900px; flex: 1;">В процессе верификации должны проверяться следующие условия: 1) непротиворечивость требований к системе и степень учета потребностей пользователей; 2) возможности поставщика выполнять заданные требования; 3) корректность описания в проектных спецификациях входных и выходных данных, последовательности событий, интерфейсов, логики и т.д.; 4) соответствие кода проектным спецификациям и требованиям; 5) тестируемость и корректность кода, его соответствие принятым стандартам кодирования; 6) корректность интеграция компонентов АС в единую систему; 7) адекватность, полнота и непротиворечивость документации</p>
              <select name="concl_42" id="concl_42" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer; width: 200px;" disabled>
                <option value="Имеется" <?php echo e($concl->concl_42 == 'Имеется' ? 'selected' : ''); ?>>Имеется</option>
                <option value="Отсутствует" <?php echo e($concl->concl_42 == 'Отсутствует' ? 'selected' : ''); ?>>Отсутствует</option>
                <option value="Не требуется" <?php echo e($concl->concl_42 == 'Не требуется' ? 'selected' : ''); ?>>Не требуется</option>
              </select>
            </div>
    
            <hr style="border-top: 2px solid #333;">
            <div style="display: flex; align-items: center; margin-bottom: 10px;">
              <p style="margin-right: 900px; flex: 1;">Аттестация - полное соответствие АС спецификациям, требованиям и документации, представленной в ТЗ, а также возможность его безопасного и надежного применения пользователем</p>
              <select name="concl_43" id="concl_43" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer; width: 200px;" disabled>
                <option value="Имеется" <?php echo e($concl->concl_43 == 'Имеется' ? 'selected' : ''); ?>>Имеется</option>
                <option value="Отсутствует" <?php echo e($concl->concl_43 == 'Отсутствует' ? 'selected' : ''); ?>>Отсутствует</option>
                <option value="Не требуется" <?php echo e($concl->concl_43 == 'Не требуется' ? 'selected' : ''); ?>>Не требуется</option>
              </select>
            </div>
    
            <hr style="border-top: 2px solid #333;">
            <div style="display: flex; align-items: center; margin-bottom: 10px;">
              <p style="margin-right: 900px; flex: 1;">Совместная проверка - контроль планирования и управления ресурсами, персоналом, аппаратурой и инструментальными средствами проекта</p>
              <select name="concl_44" id="concl_44" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer; width: 200px;" disabled>
                <option value="Имеется" <?php echo e($concl->concl_44 == 'Имеется' ? 'selected' : ''); ?>>Имеется</option>
                <option value="Отсутствует" <?php echo e($concl->concl_44 == 'Отсутствует' ? 'selected' : ''); ?>>Отсутствует</option>
                <option value="Не требуется" <?php echo e($concl->concl_44 == 'Не требуется' ? 'selected' : ''); ?>>Не требуется</option>
              </select>
            </div>
    
            <hr style="border-top: 2px solid #333;">
            <div style="display: flex; align-items: center; margin-bottom: 10px;">
              <p style="margin-right: 900px; flex: 1;">Аудит - установления соответствия реальных работ и отчетов требованиям, планам и условиям договора</p>
              <select name="concl_45" id="concl_45" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer; width: 200px;" disabled>
                <option value="Имеется" <?php echo e($concl->concl_45 == 'Имеется' ? 'selected' : ''); ?>>Имеется</option>
                <option value="Отсутствует" <?php echo e($concl->concl_45 == 'Отсутствует' ? 'selected' : ''); ?>>Отсутствует</option>
                <option value="Не требуется" <?php echo e($concl->concl_45 == 'Не требуется' ? 'selected' : ''); ?>>Не требуется</option>
              </select>
            </div>
    
            <hr style="border-top: 2px solid #333;">
            <div style="display: flex; align-items: center; margin-bottom: 10px;">
              <p style="margin-right: 900px; flex: 1;">Разрешение проблем - анализ и решение проблем (включая обнаруженные несоответствия) независимо от их происхождения или источника, которые обнаружены в ходе разработки, эксплуатации, сопровождения или других процессов. Каждая обнаруженная проблема должна быть идентифицирована, описана, проанализирована и разрешена</p>
              <select name="concl_46" id="concl_46" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer; width: 200px;" disabled>
                <option value="Имеется" <?php echo e($concl->concl_46 == 'Имеется' ? 'selected' : ''); ?>>Имеется</option>
                <option value="Отсутствует" <?php echo e($concl->concl_46 == 'Отсутствует' ? 'selected' : ''); ?>>Отсутствует</option>
                <option value="Не требуется" <?php echo e($concl->concl_46 == 'Не требуется' ? 'selected' : ''); ?>>Не требуется</option>
              </select>
            </div>
    
            <hr style="border-top: 2px solid #333;">
            <div style="display: flex; align-items: center; margin-bottom: 10px;">
              <p style="margin-right: 900px; flex: 1;">Приемка работ по стадиям должна включать перечень участвующих предприятий и организаций, место и сроки проведения, порядок согласования и утверждения приемочной документации, а также статус приемочной комиссии (государственная, межведомственная, ведомственная и т.п.)</p>
              <select name="concl_47" id="concl_47" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer; width: 200px;" disabled>
                <option value="Имеется" <?php echo e($concl->concl_47 == 'Имеется' ? 'selected' : ''); ?>>Имеется</option>
                <option value="Отсутствует" <?php echo e($concl->concl_47 == 'Отсутствует' ? 'selected' : ''); ?>>Отсутствует</option>
                <option value="Не требуется" <?php echo e($concl->concl_47 == 'Не требуется' ? 'selected' : ''); ?>>Не требуется</option>
              </select>
            </div>
          </div>
    
    
          <div style="padding: 20px; border: 1px solid #ccc; border-radius: 10px; margin-bottom: 20px;">
            <p><b>4.8 Проверка раздела «Требования к составу и содержанию работ по подготовке объекта автоматизации к вводу системы в действие»</b></p>
            <hr style="border-top: 2px solid #333;">
            <div style="display: flex; align-items: center; margin-bottom: 10px;">
              <p style="margin-right: 10px; flex: 1;">Приведение поступающей в систему информации (в соответствии с требованиями к информационному и лингвистическому обеспечению) к виду, пригодному для обработки с помощью ЭВМ.</p>
              <select name="concl_48" id="concl_48" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer; width: 200px;" disabled>
                <option value="Имеется" <?php echo e($concl->concl_48 == 'Имеется' ? 'selected' : ''); ?>>Имеется</option>
                <option value="Отсутствует" <?php echo e($concl->concl_48 == 'Отсутствует' ? 'selected' : ''); ?>>Отсутствует</option>
                <option value="Не требуется" <?php echo e($concl->concl_48 == 'Не требуется' ? 'selected' : ''); ?>>Не требуется</option>
              </select>
            </div>
            
            <hr style="border-top: 2px solid #333;">
            <div style="display: flex; align-items: center; margin-bottom: 10px;">
              <p style="margin-right: 10px; flex: 1;">Изменения, которые необходимо осуществить в объекте автоматизации.</p>
              <select name="concl_49" id="concl_49" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer; width: 200px;" disabled>
                <option value="Имеется" <?php echo e($concl->concl_49 == 'Имеется' ? 'selected' : ''); ?>>Имеется</option>
                <option value="Отсутствует" <?php echo e($concl->concl_49 == 'Отсутствует' ? 'selected' : ''); ?>>Отсутствует</option>
                <option value="Не требуется" <?php echo e($concl->concl_49 == 'Не требуется' ? 'selected' : ''); ?>>Не требуется</option>
              </select>
            </div>
            
            <hr style="border-top: 2px solid #333;">
            <div style="display: flex; align-items: center; margin-bottom: 10px;">
              <p style="margin-right: 10px; flex: 1;">Создание условий функционирования объекта автоматизации, при которых гарантируется соответствие создаваемой системы требованиям, содержащимся в ТЗ.</p>
              <select name="concl_50" id="concl_50" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer; width: 200px;" disabled>
                <option value="Имеется" <?php echo e($concl->concl_50 == 'Имеется' ? 'selected' : ''); ?>>Имеется</option>
                <option value="Отсутствует" <?php echo e($concl->concl_50 == 'Отсутствует' ? 'selected' : ''); ?>>Отсутствует</option>
                <option value="Не требуется" <?php echo e($concl->concl_50 == 'Не требуется' ? 'selected' : ''); ?>>Не требуется</option>
              </select>
            </div>
            
            <hr style="border-top: 2px solid #333;">
            <div style="display: flex; align-items: center; margin-bottom: 10px;">
              <p style="margin-right: 10px; flex: 1;">Создание необходимых для функционирования системы подразделений и служб.</p>
              <select name="concl_51" id="concl_51" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer; width: 200px;" disabled>
                <option value="Имеется" <?php echo e($concl->concl_51 == 'Имеется' ? 'selected' : ''); ?>>Имеется</option>
                <option value="Отсутствует" <?php echo e($concl->concl_51 == 'Отсутствует' ? 'selected' : ''); ?>>Отсутствует</option>
                <option value="Не требуется" <?php echo e($concl->concl_51 == 'Не требуется' ? 'selected' : ''); ?>>Не требуется</option>
              </select>
            </div>
            
            <hr style="border-top: 2px solid #333;">
            <div style="display: flex; align-items: center; margin-bottom: 10px;">
              <p style="margin-right: 10px; flex: 1;">Сроки и порядок комплектования штатов и обучения персонала.</p>
              <select name="concl_52" id="concl_52" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer; width: 200px;" disabled>
                <option value="Имеется" <?php echo e($concl->concl_52 == 'Имеется' ? 'selected' : ''); ?>>Имеется</option>
                <option value="Отсутствует" <?php echo e($concl->concl_52 == 'Отсутствует' ? 'selected' : ''); ?>>Отсутствует</option>
                <option value="Не требуется" <?php echo e($concl->concl_52 == 'Не требуется' ? 'selected' : ''); ?>>Не требуется</option>
              </select>
            </div>
          </div> 
        <div>

          <div class="conclusion_si" style="display: none;">
            <div style="padding: 20px; border: 1px solid #ccc; border-radius: 10px; margin-bottom: 20px;">
              <p><b>4.9 Проверка раздела «Требования к документированию»</b></p>
            <hr style="border-top: 2px solid #333;">
            <div style="display: flex; align-items: center; margin-bottom: 10px;">
              <p style="margin-right: 10px; flex: 1;">Согласованный разработчиком и заказчиком системы перечень подлежащих разработке комплектов и видов документов, соответствующих требованиям НТД отрасли заказчика.</p>
              <select name="concl_53" id="concl_53" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer; width: 200px;" disabled>
                <option value="Имеется" <?php echo e($concl->concl_53 == 'Имеется' ? 'selected' : ''); ?>>Имеется</option>
                <option value="Отсутствует" <?php echo e($concl->concl_53 == 'Отсутствует' ? 'selected' : ''); ?>>Отсутствует</option>
                <option value="Не требуется" <?php echo e($concl->concl_53 == 'Не требуется' ? 'selected' : ''); ?>>Не требуется</option>
              </select>
            </div>
    
            <hr style="border-top: 2px solid #333;">
            <div style="display: flex; align-items: center; margin-bottom: 10px;">
              <p style="margin-right: 10px; flex: 1;">Перечень документов, выпускаемых на машинных носителях.</p>
              <select name="concl_54" id="concl_54" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer; width: 200px;" disabled>
                <option value="Имеется" <?php echo e($concl->concl_54 == 'Имеется' ? 'selected' : ''); ?>>Имеется</option>
                <option value="Отсутствует" <?php echo e($concl->concl_54 == 'Отсутствует' ? 'selected' : ''); ?>>Отсутствует</option>
                <option value="Не требуется" <?php echo e($concl->concl_54 == 'Не требуется' ? 'selected' : ''); ?>>Не требуется</option>
              </select>
            </div>
    
            <hr style="border-top: 2px solid #333;">
            <div style="display: flex; align-items: center; margin-bottom: 10px;">
              <p style="margin-right: 10px; flex: 1;">Требования по документированию комплектующих элементов межотраслевого применения в соответствии с требованиями ЕСКД и ЕСПД.</p>
              <select name="concl_55" id="concl_55" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer; width: 200px;" disabled>
                <option value="Имеется" <?php echo e($concl->concl_55 == 'Имеется' ? 'selected' : ''); ?>>Имеется</option>
                <option value="Отсутствует" <?php echo e($concl->concl_55 == 'Отсутствует' ? 'selected' : ''); ?>>Отсутствует</option>
                <option value="Не требуется" <?php echo e($concl->concl_55 == 'Не требуется' ? 'selected' : ''); ?>>Не требуется</option>
              </select>
            </div>
    
            <hr style="border-top: 2px solid #333;">
            <div style="display: flex; align-items: center; margin-bottom: 10px;">
              <p style="margin-right: 10px; flex: 1;">При отсутствии государственных стандартов, определяющих требования к документированию элементов системы, дополнительно включают требования к составу и содержанию таких документов.</p>
              <select name="concl_56" id="concl_56" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer; width: 200px;" disabled>
                <option value="Имеется" <?php echo e($concl->concl_56 == 'Имеется' ? 'selected' : ''); ?>>Имеется</option>
                <option value="Отсутствует" <?php echo e($concl->concl_56 == 'Отсутствует' ? 'selected' : ''); ?>>Отсутствует</option>
                <option value="Не требуется" <?php echo e($concl->concl_56 == 'Не требуется' ? 'selected' : ''); ?>>Не требуется</option>
              </select>
            </div>
          </div>
          </div>

          <div class="conclusion_si" style="display: none;">
            <div style="padding: 20px; border: 1px solid #ccc; border-radius: 10px; margin-bottom: 20px;">
              <p><b>4.10 Проверка раздела «Источники разработки»</b></p>
            <hr style="border-top: 2px solid #333;">
            <div style="display: flex; align-items: center; margin-bottom: 10px;">
              <p style="margin-right: 900px; flex: 1;">Должны быть перечислены документы и информационные материалы (технико-экономическое обоснование, отчеты о законченных научно-исследовательских работах, информационные материалы на отечественные, зарубежные системы-аналоги и др.), на основании которых разрабатывалось ТЗ и которые должны быть использованы при создании системы.</p>
              <select name="concl_57" id="concl_57" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; cursor: pointer; width: 200px;" disabled>
                <option value="Имеется" <?php echo e($concl->concl_57 == 'Имеется' ? 'selected' : ''); ?>>Имеется</option>
                <option value="Отсутствует" <?php echo e($concl->concl_57 == 'Отсутствует' ? 'selected' : ''); ?>>Отсутствует</option>
                <option value="Не требуется" <?php echo e($concl->concl_57 == 'Не требуется' ? 'selected' : ''); ?>>Не требуется</option>
              </select>
            </div>
          </div>
    
          <div style="padding: 20px; border: 1px solid #ccc;border-radius: 10px; margin-bottom: 20px;">
              <p><b style="font-size: 18px; color: #333;">Выводы и рекомендации</b></p>
              <hr style="border-top: 2px solid #333; margin: 10px 0;">
              <div style="display: flex; align-items: center;">
                <p style="margin-right: 20px; color: #666;">Заключение</p>
                
                <textarea class="editable" name="concl_58" id="concl_58" readonly style="margin-left: 105px; width: 700px; height: 100px; border: 1px solid #ccc;"><?php echo e($concl->concl_58); ?></textarea>
              </div>
          </div>
            
          <div style="padding: 20px; border: 1px solid #ccc;border-radius: 10px; margin-bottom: 20px;">
              <p><b style="font-size: 18px; color: #333;">Заключение на соответствие требованиям информационной безопасности</b></p>
              <hr style="border-top: 2px solid #333; margin: 10px 0;">
              <div style="display: flex; align-items: center;">
                <p style="margin-right: 20px; color: #666;">Заключение</p>
                
                <textarea class="editable" name="concl_59" id="concl_59" readonly style="margin-left: 105px; width: 700px; height: 100px; border: 1px solid #ccc;"><?php echo e($concl->concl_59); ?></textarea>
              </div>
          </div>
      </div>
      <div>

  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <div class="buttons-wrapper">
    <button class="btn" type="submit" id="save_si_reviewer" name="save_si_reviewer" style=" font-size: 14px; background: #0178BC; margin-bottom: 10px;">Сохранить заключения</button>
  </div>
</form>

  




  

  

  

  <!-------------------------------------------------------------------------------------------------------------------->

  

      

      

  <!-------------------------------------------------------------------------------------------------------------------->

  

  <!-------------------------------------------------------------------------------------------------------------------->

  

  <!-------------------------------------------------------------------------------------------------------------------->

  
          
      <!-------------------------------------------------------------------------------------------------------------------->

      

      <!-------------------------------------------------------------------------------------------------------------------->

      


      <!-------------------------------------------------------------------------------------------------------------------->

      

      <!------------------------------------------------------------------------------------------>


      


        <!------------------------------------------------------------------------------------------>


      
  


<!------------------------------------------------------------------------------------------------------------------------->

<?php $__currentLoopData = $conclusionsUo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $concl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="conclusion_uo" style="display: none;">
      <div style="padding: 20px; border: 1px solid #ccc; border-radius: 10px; margin-bottom: 20px;">
        <p><b style="font-size: 18px; color: #333;">1. Документы, представленные на рассмотрение</b></p>
        <hr style="border-top: 2px solid #333; margin: 10px 0;">
        <div style="display: flex; align-items: center;">
          <p style="margin-right: 20px; color: #666;">Перечень документов</p>
          <textarea disabled style="margin-left: 105px; width: 700px; height: 100px; border: 1px solid #ccc;"><?php echo e($concl->concl_1); ?></textarea>
        </div>
      </div>


      

    <div style="padding: 20px; border: 1px solid #ccc; border-radius: 10px; margin-bottom: 20px;">
      <p><b style="font-size: 18px; color: #333;">2. Документы, принятые во внимание при рассмотрении</b></p>
      <hr style="border-top: 2px solid #333; margin: 10px 0;">
      <div style="display: flex; align-items: center;">
        <p style="margin-right: 20px; color: #666;">Перечень документов</p>
        <textarea disabled style="margin-left: 105px; width: 700px; height: 100px; border: 1px solid #ccc;"><?php echo e($concl->concl_2); ?></textarea>
      </div>
    </div>

    <div style="padding: 20px; border: 1px solid #ccc; border-radius: 10px; margin-bottom: 20px;">
      <p><b style="font-size: 18px; color: #333;">3. Используемые сокращения</b></p>
      <hr style="border-top: 2px solid #333; margin: 10px 0;">
      <div style="display: flex; align-items: center;">
        <p style="margin-right: 20px; color: #666;">Перечень сокращений</p>
        <textarea disabled style="margin-left: 105px; width: 700px; height: 100px; border: 1px solid #ccc;"><?php echo e($concl->concl_3); ?></textarea>
      </div>
    </div>

    <!-------------------------------------------------------------------------------------------------------------------->

    <div style="padding: 20px; border: 1px solid #ccc; border-radius: 10px; margin-bottom: 20px;">
      <p><b style="font-size: 18px;">4.1. Проверка раздела «Назначение и цели создания (развития) системы»</b></p>
      <hr style="border-top: 2px solid #333;">
      <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <p style="margin-right: 20px; font-size: 16px; flex: 1; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Общие сведения</p>
        <select disabled   style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
          <option><?php echo e($concl->concl_4); ?></option>
        </select>
      </div>
      <hr style="border-top: 2px solid #333;">
      <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <p style="margin-right: 20px; font-size: 16px; flex: 1; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Назначение системы</p>
        <select disabled   style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
          <option><?php echo e($concl->concl_5); ?></option>
        </select>
      </div>
      <hr style="border-top: 2px solid #333;">
      <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <p style="margin-right: 20px; font-size: 16px; flex: 1; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Цели создания системы</p>
        <select disabled   style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
          <option><?php echo e($concl->concl_6); ?></option>
        </select>
      </div>
    </div>

    <!-------------------------------------------------------------------------------------------------------------------->

    <div style="padding: 20px; border: 1px solid #ccc; border-radius: 10px; margin-bottom: 20px;">
      <p><b style="font-size: 18px;">4.2 Проверка раздела «Характеристика объектов автоматизации»</b></p>
      <hr style="border-top: 2px solid #333;">
      <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <p style="margin-right: 900px; font-size: 16px; flex: 1;">Краткое описание технологического процесса или производства с приведением основных технологических характеристик и особенностей процесса или производства (ссылки на документы, содержащие такую информацию)</p>
        <select disabled   style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
          <option><?php echo e($concl->concl_7); ?></option>
        </select>
      </div>
      <hr style="border-top: 2px solid #333;">
      <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <p style="margin-right: 900px; font-size: 16px; flex: 1;">Описание технологического процесса или производства (технической системы) как объекта управления. Дается описание статических и динамических характеристик объекта и их влияние на технико-экономические показатели, а также особенности свойственные данному объекту</p>
        <select disabled   style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
          <option><?php echo e($concl->concl_8); ?></option>
        </select>
      </div>
      <hr style="border-top: 2px solid #333;">
      <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <p style="margin-right: 900px; font-size: 16px; flex: 1;">Сведения о: 1) задачах и функциях, решаемых в практике управления; 2) существующей практике контроля и управления; 3) технических, информационных и математических средствах и методах используемых на практике</p>
        <select disabled   style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
          <option><?php echo e($concl->concl_9); ?></option>
        </select>
      </div>
      <hr style="border-top: 2px solid #333;">
      <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <p style="margin-right: 900px; font-size: 16px; flex: 1;">Сведения о достоинствах и недостатках существующей практики управления</p>
        <select disabled   style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
          <option><?php echo e($concl->concl_10); ?></option>
        </select>
      </div>
      <hr style="border-top: 2px solid #333;">
      <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <p style="margin-right: 900px; font-size: 16px; flex: 1;">Сведения об условиях эксплуатации объекта автоматизации и характеристиках окружающей среды</p>
        <select disabled   style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
          <option><?php echo e($concl->concl_11); ?></option>
        </select>
      </div>
      <hr style="border-top: 2px solid #333;">
      <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <p style="margin-right: 900px; font-size: 16px; flex: 1;">Описание предлагаемой структуры технического, информационного и математического обеспечения</p>
        <select disabled   style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
          <option><?php echo e($concl->concl_12); ?></option>
        </select>
      </div>
    </div>

    <!-------------------------------------------------------------------------------------------------------------------->

    <div style="padding: 20px; border: 1px solid #ccc; border-radius: 10px; margin-bottom: 20px;">
        <p><b>4.3 Проверка подраздела «Требования к системе в целом» раздела «Требования к системе»</b></p>
        <hr  style="border-top: 2px solid #333;">
        <div style="display: flex; align-items: center; margin-bottom: 10px;">
          <p style="margin-right: 900px; font-size: 16px; flex: 1;">1. Требования к структуре и функционированию системы: - перечень подсистем, их назначение и основные характеристики, требования к числу уровней иерархии и степени централизации системы; - требования к способам и средствам связи для информационного обмена между компонентами системы; - требования к характеристикам взаимосвязей создаваемой системы со смежными системами, требования к ее совместимости, в том числе указания о способах обмена информацией (автоматически, пересылкой документов, по телефону и т. п.); - требования к безопасности структуры системы; - требования к режимам функционирования системы; - требования по диагностированию системы; - перспективы развития, модернизации системы.</p>
          <select disabled   style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
            <option><?php echo e($concl->concl_13); ?></option>
          </select>
        </div>
        <hr style="border-top: 2px solid #333;">
        <div style="display: flex; align-items: center; margin-bottom: 10px;">
          <p style="margin-right: 900px; font-size: 16px; flex: 1;">2. Требования к надежности - состав и количественные значения показателей надежности для системы в целом или ее подсистем; - перечень аварийных ситуаций, по которым должны быть регламентированы требования к надежности, и значения соответствующих показателей; - требования к надежности технических средств и программного обеспечения; - требования к методам оценки и контроля показателей надежности на разных стадиях создания системы в соответствии с действующими нормативно-техническими документами.</p>
          <select disabled   style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
            <option><?php echo e($concl->concl_14); ?></option>
          </select>
        </div>
        <hr style="border-top: 2px solid #333;">
      <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <p style="margin-right: 900px; font-size: 16px; flex: 1;">3. Требования безопасности - требования по обеспечению безопасности при монтаже, наладке, эксплуатации, обслуживании и ремонте технических средств системы (защита от воздействий электрического тока, электромагнитных полей, акустических шумов и т. п.), по допустимым уровням освещенности, вибрационных и шумовых нагрузок.</p>
        <select disabled   style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
          <option><?php echo e($concl->concl_15); ?></option>
        </select>
      </div>

      <hr style="border-top: 2px solid #333;">
      <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <p style="margin-right: 900px; font-size: 16px; flex: 1;">4. Требования к численности и квалификации персонала системы и режиму его работы - требования к численности персонала (пользователей) АС; - требования к квалификации персонала, порядку его подготовки и контроля знаний и навыков; - требуемый режим работы персонала АС.
      </p>
        <select disabled   style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
          <option><?php echo e($concl->concl_16); ?></option>
        </select>
      </div>

      <hr style="border-top: 2px solid #333;">
      <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <p style="margin-right: 900px; font-size: 16px; flex: 1;">5. Требования к показателям назначения АС - приводятся значения параметров, характеризующие степень соответствия системы ее назначению. - указывают: степень приспособляемости системы к изменению процессов и методов управления, к отклонениям параметров объекта управления; допустимые пределы модернизации и развития системы; вероятностно-временные характеристики, при которых сохраняется целевое назначение системы.
      </p>
        <select disabled   style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
          <option><?php echo e($concl->concl_17); ?></option>
        </select>
      </div>

      <hr style="border-top: 2px solid #333;">
      <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <p style="margin-right: 900px; font-size: 16px; flex: 1;">6. Требования к эргономике и технической эстетике</p>
        <select disabled   style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
          <option><?php echo e($concl->concl_18); ?></option>
        </select>
      </div>

      <hr style="border-top: 2px solid #333;">
      <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <p style="margin-right: 900px; font-size: 16px; flex: 1;">7. Требования к эксплуатации, техническому обслуживанию, ремонту и хранению компонентов системы - условия и регламент (режим) эксплуатации, которые должны обеспечивать использование технических средств (ТС) системы с заданными техническими показателями, в том числе виды и периодичность обслуживания ТС системы или допустимость работы без обслуживания; - предварительные требования к допустимым площадям для размещения персонала и ТС системы, к параметрам сетей энергоснабжения и т. п.; - требования по количеству, квалификации обслуживающего персонала и режимам его работы; - требования к составу, размещению и условиям хранения комплекта запасных изделий и приборов; - требования к регламенту обслуживания.</p>
        <select disabled   style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
          <option><?php echo e($concl->concl_19); ?></option>
        </select>
      </div>

      <hr style="border-top: 2px solid #333;">
      <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <p style="margin-right: 900px; font-size: 16px; flex: 1;">8. Требования к защите информации от несанкционированного доступа</p>
        <select disabled   style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
          <option><?php echo e($concl->concl_20); ?></option>
        </select>
      </div>

      <hr style="border-top: 2px solid #333;">
      <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <p style="margin-right: 900px; font-size: 16px; flex: 1;">9. Требования по сохранности информации при авариях</p>
        <select disabled   style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
          <option><?php echo e($concl->concl_21); ?></option>
        </select>
      </div>

      <hr style="border-top: 2px solid #333;">
      <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <p style="margin-right: 900px; font-size: 16px; flex: 1;">10. Требования к защите от влияния внешних воздействий - требования к радиоэлектронной защите средств АС; - требования по стойкости, устойчивости и прочности к внешним воздействиям (среде применения).</p>
        <select disabled   style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
          <option><?php echo e($concl->concl_22); ?></option>
        </select>
      </div>

      <hr style="border-top: 2px solid #333;">
      <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <p style="margin-right: 900px; font-size: 16px; flex: 1;">11. Требования к патентной чистоте</p>
        <select disabled   style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
          <option><?php echo e($concl->concl_23); ?></option>
        </select>
      </div>

      <hr style="border-top: 2px solid #333;">
      <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <p style="margin-right: 900px; font-size: 16px; flex: 1;">12. Требования по стандартизации и унификации</p>
        <select disabled   style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
          <option><?php echo e($concl->concl_24); ?></option>
        </select>
      </div>
    </div>
        
    <!-------------------------------------------------------------------------------------------------------------------->

    <div style="padding: 20px; border: 1px solid #ccc; border-radius: 10px; margin-bottom: 20px;">
      <p><b>4.4 Проверка подраздела «Требование к функциям (задачам)» раздела «Требования к системе»</b></p>
      <hr style="border-top: 2px solid #333;">
      <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <p style="margin-right: 900px; flex: 1;">Привести по каждой подсистеме перечень функций, задач или их комплексов, подлежащих автоматизации
        </p>
        <select disabled   style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
          <option><?php echo e($concl->concl_25); ?></option>
        </select>
      </div>

      <hr style="border-top: 2px solid #333;">
      <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <p style="margin-right: 900px; flex: 1;">При создании системы в две или более очереди - перечень функциональных подсистем, отдельных функций или задач, вводимых в действие в 1-й и последующих очередях</p>
        <select disabled   style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
          <option><?php echo e($concl->concl_26); ?></option>
        </select>
      </div>

      <hr style="border-top: 2px solid #333;">
      <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <p style="margin-right: 900px; flex: 1;">Временной регламент реализации каждой функции, задачи (или комплекса задач)</p>
        <select disabled   style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
          <option><?php echo e($concl->concl_27); ?></option>
        </select>
      </div>

      <hr style="border-top: 2px solid #333;">
      <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <p style="margin-right: 900px; flex: 1;">Требования к форме представления выходной информации, к качеству реализации исполнения каждой функции (задачи или комплекса задач), характеристики необходимой точности и времени выполнения, требования одновременности выполнения группы функций, достоверности выдачи результатов</p>
        <select disabled   style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
          <option><?php echo e($concl->concl_28); ?></option>
        </select>
      </div>

      <hr style="border-top: 2px solid #333;">
      <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <p style="margin-right: 900px; flex: 1;">Перечень и критерии отказов для каждой функции, по которой задаются требования по надежности</p>
        <select disabled   style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
          <option><?php echo e($concl->concl_29); ?></option>
        </select>
      </div>
    </div>    

    <!-------------------------------------------------------------------------------------------------------------------->

    <div style="padding: 20px; border: 1px solid #ccc; border-radius: 10px; margin-bottom: 20px;">
        <p><b>4.5 Проверка подраздела «Требования к видам обеспечения» раздела «Требования к системе»</b></p>
      <hr style="border-top: 2px solid #333;">
      <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <p style="margin-right: 10px; flex: 1;">Требование к математическому обеспечению</p>
        <select disabled   style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
          <option><?php echo e($concl->concl_30); ?></option>
        </select>
      </div>

      <hr style="border-top: 2px solid #333;">
      <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <p style="margin-right: 10px; flex: 1;">Требование к информационному обеспечению</p>
        <select disabled   style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
          <option><?php echo e($concl->concl_31); ?></option>
        </select>
      </div>

      <hr style="border-top: 2px solid #333;">
      <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <p style="margin-right: 10px; flex: 1;">Требование к лингвистическому обеспечению</p>
        <select disabled   style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
          <option><?php echo e($concl->concl_32); ?></option>
        </select>
      </div>

      <hr style="border-top: 2px solid #333;">
      <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <p style="margin-right: 10px; flex: 1;">Требование к программному обеспечению</p>
        <select disabled   style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
          <option><?php echo e($concl->concl_33); ?></option>
        </select>
      </div>

      <hr style="border-top: 2px solid #333;">
      <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <p style="margin-right: 10px; flex: 1;">Требование к техническому обеспечению</p>
        <select disabled   style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
          <option><?php echo e($concl->concl_34); ?></option>
        </select>
      </div>

      <hr style="border-top: 2px solid #333;">
      <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <p style="margin-right: 10px; flex: 1;">Требование к метрологическому обеспечению</p>
        <select disabled   style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
          <option><?php echo e($concl->concl_35); ?></option>
        </select>
      </div>

      <hr style="border-top: 2px solid #333;">
      <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <p style="margin-right: 10px; flex: 1;">Требование к организационному, методическому и другим видам обеспечения системы</p>
        <select disabled   style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
          <option><?php echo e($concl->concl_36); ?></option>
        </select>
      </div>
    </div>


    <!-------------------------------------------------------------------------------------------------------------------->

    <div style="padding: 20px; border: 1px solid #ccc; border-radius: 10px; margin-bottom: 20px;">
        <p><b>4.6 Проверка раздела «Состав и содержание работ по созданию/модификации системы»</b></p>
        <hr style="border-top: 2px solid #333;">
        <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <p style="margin-right: 900px; flex: 1;">Перечень стадий и этапов работ по созданию системы в соответствии с ГОСТ 34.601, сроки их выполнения, перечень организаций - исполнителей работ, ссылки на документы, подтверждающие согласие этих организаций на участие в создании системы, или запись, определяющую ответственного (заказчик или разработчик) за проведение этих работ</p>
        <select disabled   style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
          <option><?php echo e($concl->concl_37); ?></option>
        </select>
      </div>

      <hr style="border-top: 2px solid #333;">
      <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <p style="margin-right: 900px; flex: 1;">Перечень документов, предъявляемых по окончании соответствующих стадий и этапов работ</p>
        <select disabled   style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
          <option><?php echo e($concl->concl_38); ?></option>
        </select>
      </div>

      <hr style="border-top: 2px solid #333;">
      <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <p style="margin-right: 900px; flex: 1;">Вид и порядок проведения экспертизы технической документации (стадия, этап, объем проверяемой документации, организация-эксперт)</p>
        <select disabled   style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
          <option><?php echo e($concl->concl_39); ?></option>
        </select>
      </div>

      <hr style="border-top: 2px solid #333;">
      <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <p style="margin-right: 900px; flex: 1;">Программа работ, направленных на обеспечение требуемого уровня надежности разрабатываемой системы (при необходимости)</p>
        <select disabled   style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
          <option><?php echo e($concl->concl_40); ?></option>
        </select>
      </div>

      <hr style="border-top: 2px solid #333;">
      <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <p style="margin-right: 900px; flex: 1;">Перечень работ по метрологическому обеспечению на всех стадиях создания системы с указанием их сроков выполнения и организаций-исполнителей (при необходимости)</p>
        <select disabled   style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
          <option><?php echo e($concl->concl_41); ?></option>
        </select>
      </div>
    </div>

    <div style="padding: 20px; border: 1px solid #ccc; border-radius: 10px; margin-bottom: 20px;">
        <p><b>4.7 Проверка раздела «Порядок контроля и приемки системы»</b></p>
      <hr style="border-top: 2px solid #333;">
      <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <p style="margin-right: 900px; flex: 1;">В процессе верификации должны проверяться следующие условия: 1) непротиворечивость требований к системе и степень учета потребностей пользователей; 2) возможности поставщика выполнять заданные требования; 3) корректность описания в проектных спецификациях входных и выходных данных, последовательности событий, интерфейсов, логики и т.д.; 4) соответствие кода проектным спецификациям и требованиям; 5) тестируемость и корректность кода, его соответствие принятым стандартам кодирования; 6) корректность интеграция компонентов АС в единую систему; 7) адекватность, полнота и непротиворечивость документации</p>
        <select disabled   style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
          <option><?php echo e($concl->concl_42); ?></option>
        </select>
      </div>

      <hr style="border-top: 2px solid #333;">
      <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <p style="margin-right: 900px; flex: 1;">Аттестация - полное соответствие АС спецификациям, требованиям и документации, представленной в ТЗ, а также возможность его безопасного и надежного применения пользователем</p>
        <select disabled   style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
          <option><?php echo e($concl->concl_43); ?></option>
        </select>
      </div>

      <hr style="border-top: 2px solid #333;">
      <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <p style="margin-right: 900px; flex: 1;">Совместная проверка - контроль планирования и управления ресурсами, персоналом, аппаратурой и инструментальными средствами проекта</p>
        <select disabled   style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
          <option><?php echo e($concl->concl_44); ?></option>
        </select>
      </div>

      <hr style="border-top: 2px solid #333;">
      <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <p style="margin-right: 900px; flex: 1;">Аудит - установления соответствия реальных работ и отчетов требованиям, планам и условиям договора</p>
        <select disabled   style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
          <option><?php echo e($concl->concl_45); ?></option>
        </select>
      </div>

      <hr style="border-top: 2px solid #333;">
      <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <p style="margin-right: 900px; flex: 1;">Разрешение проблем - анализ и решение проблем (включая обнаруженные несоответствия) независимо от их происхождения или источника, которые обнаружены в ходе разработки, эксплуатации, сопровождения или других процессов. Каждая обнаруженная проблема должна быть идентифицирована, описана, проанализирована и разрешена</p>
        <select disabled   style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
          <option><?php echo e($concl->concl_46); ?></option>
        </select>
      </div>

      <hr style="border-top: 2px solid #333;">
      <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <p style="margin-right: 900px; flex: 1;">Приемка работ по стадиям должна включать перечень участвующих предприятий и организаций, место и сроки проведения, порядок согласования и утверждения приемочной документации, а также статус приемочной комиссии (государственная, межведомственная, ведомственная и т.п.)</p>
        <select disabled   style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
          <option><?php echo e($concl->concl_47); ?></option>
        </select>
      </div>
    </div>


    <div style="padding: 20px; border: 1px solid #ccc; border-radius: 10px; margin-bottom: 20px;">
      <p><b>4.8 Проверка раздела «Требования к составу и содержанию работ по подготовке объекта автоматизации к вводу системы в действие»</b></p>
      <hr style="border-top: 2px solid #333;">
      <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <p style="margin-right: 10px; flex: 1;">Приведение поступающей в систему информации (в соответствии с требованиями к информационному и лингвистическому обеспечению) к виду, пригодному для обработки с помощью ЭВМ.</p>
        <select disabled   style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
          <option><?php echo e($concl->concl_48); ?></option>
        </select>
      </div>
      
      <hr style="border-top: 2px solid #333;">
      <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <p style="margin-right: 10px; flex: 1;">Изменения, которые необходимо осуществить в объекте автоматизации.</p>
        <select disabled   style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
          <option><?php echo e($concl->concl_49); ?></option>
        </select>
      </div>
      
      <hr style="border-top: 2px solid #333;">
      <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <p style="margin-right: 10px; flex: 1;">Создание условий функционирования объекта автоматизации, при которых гарантируется соответствие создаваемой системы требованиям, содержащимся в ТЗ.</p>
        <select disabled   style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
          <option><?php echo e($concl->concl_50); ?></option>
        </select>
      </div>
      
      <hr style="border-top: 2px solid #333;">
      <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <p style="margin-right: 10px; flex: 1;">Создание необходимых для функционирования системы подразделений и служб.</p>
        <select disabled   style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
          <option><?php echo e($concl->concl_51); ?></option>
        </select>
      </div>
      
      <hr style="border-top: 2px solid #333;">
      <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <p style="margin-right: 10px; flex: 1;">Сроки и порядок комплектования штатов и обучения персонала.</p>
        <select disabled   style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
          <option><?php echo e($concl->concl_52); ?></option>
        </select>
      </div>
    </div> 

    <!------------------------------------------------------------------------------------------>


    <div style="padding: 20px; border: 1px solid #ccc; border-radius: 10px; margin-bottom: 20px;">
        <p><b>4.9 Проверка раздела «Требования к документированию»</b></p>
      <hr style="border-top: 2px solid #333;">
      <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <p style="margin-right: 10px; flex: 1;">Согласованный разработчиком и заказчиком системы перечень подлежащих разработке комплектов и видов документов, соответствующих требованиям НТД отрасли заказчика.</p>
        <select disabled   style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
          <option><?php echo e($concl->concl_53); ?></option>
        </select>
      </div>

      <hr style="border-top: 2px solid #333;">
      <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <p style="margin-right: 10px; flex: 1;">Перечень документов, выпускаемых на машинных носителях.</p>
        <select disabled   style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
          <option><?php echo e($concl->concl_54); ?></option>
        </select>
      </div>

      <hr style="border-top: 2px solid #333;">
      <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <p style="margin-right: 10px; flex: 1;">Требования по документированию комплектующих элементов межотраслевого применения в соответствии с требованиями ЕСКД и ЕСПД.</p>
        <select disabled   style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
          <option><?php echo e($concl->concl_55); ?></option>
        </select>
      </div>

      <hr style="border-top: 2px solid #333;">
      <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <p style="margin-right: 10px; flex: 1;">При отсутствии государственных стандартов, определяющих требования к документированию элементов системы, дополнительно включают требования к составу и содержанию таких документов.</p>
        <select disabled   style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
          <option selected >Выбрать исполнителя</option>
          <option><?php echo e($concl->concl_56); ?></option>
        </select>
      </div>
    </div>


      <!------------------------------------------------------------------------------------------>


    <div style="padding: 20px; border: 1px solid #ccc; border-radius: 10px; margin-bottom: 20px;">
        <p><b>4.10 Проверка раздела «Источники разработки»</b></p>
      <hr style="border-top: 2px solid #333;">
      <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <p style="margin-right: 900px; flex: 1;">Должны быть перечислены документы и информационные материалы (технико-экономическое обоснование, отчеты о законченных научно-исследовательских работах, информационные материалы на отечественные, зарубежные системы-аналоги и др.), на основании которых разрабатывалось ТЗ и которые должны быть использованы при создании системы.</p>
        <select disabled   style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
          <option><?php echo e($concl->concl_57); ?></option>
        </select>
      </div>
    </div>

    <div style="padding: 20px; border: 1px solid #ccc;border-radius: 10px; margin-bottom: 20px;">
        <p><b style="font-size: 18px; color: #333;">Выводы и рекомендации</b></p>
        <hr style="border-top: 2px solid #333; margin: 10px 0;">
        <div style="display: flex; align-items: center;">
          <p style="margin-right: 20px; color: #666;">Заключение</p>
          <textarea disabledstyle="margin-left: 105px; width: 700px; height: 100px; border: 1px solid #ccc;"><?php echo e($concl->concl_58); ?></textarea>
        </div>
    </div>
      
    <div style="padding: 20px; border: 1px solid #ccc;border-radius: 10px; margin-bottom: 20px;">
        <p><b style="font-size: 18px; color: #333;">Заключение на соответствие требованиям информационной безопасности</b></p>
        <hr style="border-top: 2px solid #333; margin: 10px 0;">
        <div style="display: flex; align-items: center;">
          <p style="margin-right: 20px; color: #666;">Заключение</p>
          <textarea disabled style="margin-left: 105px; width: 700px; height: 100px; border: 1px solid #ccc;"><?php echo e($concl->concl_59); ?></textarea>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




<!------------------------------------------------------------------------------------------------------------------------->

<?php $__currentLoopData = $conclusionsGts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $concl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="conclusion_gts" style="display: none;">

    <div style="padding: 20px; border: 1px solid #ccc;border-radius: 10px; margin-bottom: 20px;">
        <p><b style="font-size: 18px; color: #333;">Заключение на соответствие требованиям информационной безопасности</b></p>
        <hr style="border-top: 2px solid #333; margin: 10px 0;">
        <div style="display: flex; align-items: center;">
          <p style="margin-right: 20px; color: #666;">Заключение</p>
          <textarea disabled style="margin-left: 105px; width: 700px; height: 100px; border: 1px solid #ccc;"><?php echo e($concl->concl_59); ?></textarea>
        </div>
    </div>

  </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->startSection('scripts'); ?>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    var selectElement = document.querySelector('#conSelect');
    var conclusionsSi = document.querySelectorAll('.conclusion_si');
    var conclusionsUo = document.querySelectorAll('.conclusion_uo');
    var conclusionsGts = document.querySelectorAll('.conclusion_gts');

    function toggleConclusions(selectedOption) {
      switch (selectedOption) {
        case 'СИ':
          hideAllConclusions();
          conclusionsSi.forEach(function (element) {
            element.style.display = 'block';
          });
          break;
        case 'УО':
          hideAllConclusions();
          conclusionsUo.forEach(function (element) {
            element.style.display = 'block';
          });
          break;
        case 'ГТС':
          hideAllConclusions();
          conclusionsGts.forEach(function (element) {
            element.style.display = 'block';
          });
          break;
        default:
          hideAllConclusions();
      }
    }

    function hideAllConclusions() {
      conclusionsSi.forEach(function (element) {
        element.style.display = 'none';
      });
      conclusionsUo.forEach(function (element) {
        element.style.display = 'none';
      });
      conclusionsGts.forEach(function (element) {
        element.style.display = 'none';
      });
    }

    selectElement.addEventListener('change', function () {
      toggleConclusions(this.value);
    });

    // Initially hide all conclusions
    hideAllConclusions();
  });


</script>
<?php $__env->stopSection(); ?>









<?php /**PATH C:\Users\user\Documents\НОВЫЙ ПОРТАЛ\www\resources\views/expertise/signing/comments_show.blade.php ENDPATH**/ ?>