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


<nav class="is-tabs tabs" style="border: 1px solid black">
  <a style="width: 25%; font-size: 16px; color:black" class="tabs__link" href="#" data-id="5">Написать</a>
  </nav>
  <button style="padding: 10px; margin-bottom: 10px;" id="exportButton">Экспорт заключения</button>

  




  <?php $__currentLoopData = $conclusions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $concl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

  <div class="conclusion_si" style="display: none;">
    <div style="padding: 20px; border: 1px solid #ccc; border-radius: 10px; margin-bottom: 20px;">
      <div style="display: flex; align-items: center;">
        <p style="margin-right: 20px; color: #666;">Результат СИ:</p>
        <?php echo e($concl->status_concl); ?>

      </div>
    </div>

  <div class="conclusion_si" style="display: none;">
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
            <textarea disabled style="margin-left: 105px; width: 700px; height: 100px; border: 1px solid #ccc;"><?php echo e($concl->concl_58); ?></textarea>
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