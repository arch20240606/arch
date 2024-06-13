<div class="info-box-error" id="error_sign_box" style="display: none; margin-bottom: 5px;"></div>
<div class="success-info" id="success_sign_box" style="display: none; margin-bottom: 5px;"></div>


<h2 class="is-content-title">Форма создания комментариев или заключения</h2>

<nav class="is-tabs tabs" style="border: 1px solid rgb(112, 107, 107); width: 150px;">
  <a style="width: 25%; font-size: 16px; color:black" class="tabs__link" href="#" data-id="7">Просмотр</a>
</nav>


<form class="form" method="POST" action="<?php echo e(route('expertise.store')); ?>">
  <?php echo csrf_field(); ?>
   

  <?php
  $conclusions = App\Models\ExpertiseConclutionSi::all(); // Получаем всех пользователей
  ?>
 

<div style="padding: 20px; border: 1px solid #ccc; border-radius: 10px; margin-bottom: 20px;">
  <p><b style="font-size: 18px; color: #333;">1. Документы, представленные на рассмотрение</b></p>
  <hr style="border-top: 2px solid #333; margin: 10px 0;">
  <div style="display: flex; align-items: center;">
    <p style="margin-right: 20px; color: #666;">Перечень документов</p>
    <textarea id="concl_1" name="concl_1" style="margin-left: 105px; width: 700px; height: 100px; border: 1px solid #ccc;"></textarea>
  </div>
</div>

<div style="padding: 20px; border: 1px solid #ccc; border-radius: 10px; margin-bottom: 20px;">
  <p><b style="font-size: 18px; color: #333;">2. Документы, принятые во внимание при рассмотрении</b></p>
  <hr style="border-top: 2px solid #333; margin: 10px 0;">
  <div style="display: flex; align-items: center;">
    <p style="margin-right: 20px; color: #666;">Перечень документов</p>
    <textarea id="concl_2" name="concl_2" style="margin-left: 105px; width: 700px; height: 100px; border: 1px solid #ccc;"></textarea>
  </div>
</div>

<div style="padding: 20px; border: 1px solid #ccc; border-radius: 10px; margin-bottom: 20px;">
  <p><b style="font-size: 18px; color: #333;">3. Используемые сокращения</b></p>
  <hr style="border-top: 2px solid #333; margin: 10px 0;">
  <div style="display: flex; align-items: center;">
    <p style="margin-right: 20px; color: #666;">Перечень сокращений</p>
    <textarea id="concl_3" name="concl_3" style="margin-left: 105px; width: 700px; height: 100px; border: 1px solid #ccc;"></textarea>
  </div>
</div>

<!-------------------------------------------------------------------------------------------------------------------->

<div style="padding: 20px; border: 1px solid #ccc; border-radius: 10px; margin-bottom: 20px;">
  <p><b style="font-size: 18px;">4.1. Проверка раздела «Назначение и цели создания (развития) системы»</b></p>
  <hr style="border-top: 2px solid #333;">
  <div style="display: flex; align-items: center; margin-bottom: 10px;">
    <p style="margin-right: 20px; font-size: 16px; flex: 1; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Общие сведения</p>
    <select id="concl_4" name="concl_4" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
      <option value="Имеется">Имеется</option>
      <option value="Отсутствует">Отсутствует</option>
      <option value="Не требуется">Не требуется</option>
    </select>
  </div>
  <hr style="border-top: 2px solid #333;">
  <div style="display: flex; align-items: center; margin-bottom: 10px;">
    <p style="margin-right: 20px; font-size: 16px; flex: 1; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Назначение системы</p>
    <select id="concl_5" name="concl_5" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
      <option value="Имеется">Имеется</option>
      <option value="Отсутствует">Отсутствует</option>
      <option value="Не требуется">Не требуется</option>
    </select>
  </div>
  <hr style="border-top: 2px solid #333;">
  <div style="display: flex; align-items: center; margin-bottom: 10px;">
    <p style="margin-right: 20px; font-size: 16px; flex: 1; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Цели создания системы</p>
    <select id="concl_6" name="concl_6" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
      <option value="Имеется">Имеется</option>
      <option value="Отсутствует">Отсутствует</option>
      <option value="Не требуется">Не требуется</option>
    </select>
  </div>
</div>

<!-------------------------------------------------------------------------------------------------------------------->

<div style="padding: 20px; border: 1px solid #ccc; border-radius: 10px; margin-bottom: 20px;">
  <p><b style="font-size: 18px;">4.2 Проверка раздела «Характеристика объектов автоматизации»</b></p>
  <hr style="border-top: 2px solid #333;">
  <div style="display: flex; align-items: center; margin-bottom: 10px;">
    <p style="margin-right: 900px; font-size: 16px; flex: 1;">Краткое описание технологического процесса или производства с приведением основных технологических характеристик и особенностей процесса или производства (ссылки на документы, содержащие такую информацию)</p>
    <select id="concl_7" name="concl_7" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
      <option value="Имеется">Имеется</option>
      <option value="Отсутствует">Отсутствует</option>
      <option value="Не требуется">Не требуется</option>
    </select>
  </div>
  <hr style="border-top: 2px solid #333;">
  <div style="display: flex; align-items: center; margin-bottom: 10px;">
    <p style="margin-right: 900px; font-size: 16px; flex: 1;">Описание технологического процесса или производства (технической системы) как объекта управления. Дается описание статических и динамических характеристик объекта и их влияние на технико-экономические показатели, а также особенности свойственные данному объекту</p>
    <select id="concl_8" name="concl_8" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
      <option value="Имеется">Имеется</option>
      <option value="Отсутствует">Отсутствует</option>
      <option value="Не требуется">Не требуется</option>
    </select>
  </div>
  <hr style="border-top: 2px solid #333;">
  <div style="display: flex; align-items: center; margin-bottom: 10px;">
    <p style="margin-right: 900px; font-size: 16px; flex: 1;">Сведения о: 1) задачах и функциях, решаемых в практике управления; 2) существующей практике контроля и управления; 3) технических, информационных и математических средствах и методах используемых на практике</p>
    <select id="concl_9" name="concl_9" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
      <option value="Имеется">Имеется</option>
      <option value="Отсутствует">Отсутствует</option>
      <option value="Не требуется">Не требуется</option>
    </select>
  </div>
  <hr style="border-top: 2px solid #333;">
  <div style="display: flex; align-items: center; margin-bottom: 10px;">
    <p style="margin-right: 900px; font-size: 16px; flex: 1;">Сведения о достоинствах и недостатках существующей практики управления</p>
    <select id="concl_10" name="concl_10" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
      <option value="Имеется">Имеется</option>
      <option value="Отсутствует">Отсутствует</option>
      <option value="Не требуется">Не требуется</option>
    </select>
  </div>
  <hr style="border-top: 2px solid #333;">
  <div style="display: flex; align-items: center; margin-bottom: 10px;">
    <p style="margin-right: 900px; font-size: 16px; flex: 1;">Сведения об условиях эксплуатации объекта автоматизации и характеристиках окружающей среды</p>
    <select id="concl_11" name="concl_11" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
      <option value="Имеется">Имеется</option>
      <option value="Отсутствует">Отсутствует</option>
      <option value="Не требуется">Не требуется</option>
    </select>
  </div>
  <hr style="border-top: 2px solid #333;">
  <div style="display: flex; align-items: center; margin-bottom: 10px;">
    <p style="margin-right: 900px; font-size: 16px; flex: 1;">Описание предлагаемой структуры технического, информационного и математического обеспечения</p>
    <select id="concl_12" name="concl_12" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
      <option value="Имеется">Имеется</option>
      <option value="Отсутствует">Отсутствует</option>
      <option value="Не требуется">Не требуется</option>
    </select>
  </div>
</div>

<!-------------------------------------------------------------------------------------------------------------------->

<div style="padding: 20px; border: 1px solid #ccc; border-radius: 10px; margin-bottom: 20px;">
    <p><b>4.3 Проверка подраздела «Требования к системе в целом» раздела «Требования к системе»</b></p>
    <hr  style="border-top: 2px solid #333;">
    <div style="display: flex; align-items: center; margin-bottom: 10px;">
      <p style="margin-right: 900px; font-size: 16px; flex: 1;">1. Требования к структуре и функционированию системы: - перечень подсистем, их назначение и основные характеристики, требования к числу уровней иерархии и степени централизации системы; - требования к способам и средствам связи для информационного обмена между компонентами системы; - требования к характеристикам взаимосвязей создаваемой системы со смежными системами, требования к ее совместимости, в том числе указания о способах обмена информацией (автоматически, пересылкой документов, по телефону и т. п.); - требования к безопасности структуры системы; - требования к режимам функционирования системы; - требования по диагностированию системы; - перспективы развития, модернизации системы.</p>
      <select id="concl_13" name="concl_13" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
        <option value="Имеется">Имеется</option>
        <option value="Отсутствует">Отсутствует</option>
        <option value="Не требуется">Не требуется</option>
      </select>
    </div>
    <hr style="border-top: 2px solid #333;">
    <div style="display: flex; align-items: center; margin-bottom: 10px;">
      <p style="margin-right: 900px; font-size: 16px; flex: 1;">2. Требования к надежности - состав и количественные значения показателей надежности для системы в целом или ее подсистем; - перечень аварийных ситуаций, по которым должны быть регламентированы требования к надежности, и значения соответствующих показателей; - требования к надежности технических средств и программного обеспечения; - требования к методам оценки и контроля показателей надежности на разных стадиях создания системы в соответствии с действующими нормативно-техническими документами.</p>
      <select id="concl_14" name="concl_14" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
        <option value="Имеется">Имеется</option>
        <option value="Отсутствует">Отсутствует</option>
        <option value="Не требуется">Не требуется</option>
      </select>
    </div>
    <hr style="border-top: 2px solid #333;">
  <div style="display: flex; align-items: center; margin-bottom: 10px;">
    <p style="margin-right: 900px; font-size: 16px; flex: 1;">3. Требования безопасности - требования по обеспечению безопасности при монтаже, наладке, эксплуатации, обслуживании и ремонте технических средств системы (защита от воздействий электрического тока, электромагнитных полей, акустических шумов и т. п.), по допустимым уровням освещенности, вибрационных и шумовых нагрузок.</p>
    <select id="concl_15" name="concl_15" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
      <option value="Имеется">Имеется</option>
      <option value="Отсутствует">Отсутствует</option>
      <option value="Не требуется">Не требуется</option>
    </select>
  </div>

  <hr style="border-top: 2px solid #333;">
  <div style="display: flex; align-items: center; margin-bottom: 10px;">
    <p style="margin-right: 900px; font-size: 16px; flex: 1;">4. Требования к численности и квалификации персонала системы и режиму его работы - требования к численности персонала (пользователей) АС; - требования к квалификации персонала, порядку его подготовки и контроля знаний и навыков; - требуемый режим работы персонала АС.
  </p>
  <select id="concl_16" name="concl_16" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
    <option value="Имеется">Имеется</option>
    <option value="Отсутствует">Отсутствует</option>
    <option value="Не требуется">Не требуется</option>
  </select>
  </div>

  <hr style="border-top: 2px solid #333;">
  <div style="display: flex; align-items: center; margin-bottom: 10px;">
    <p style="margin-right: 900px; font-size: 16px; flex: 1;">5. Требования к показателям назначения АС - приводятся значения параметров, характеризующие степень соответствия системы ее назначению. - указывают: степень приспособляемости системы к изменению процессов и методов управления, к отклонениям параметров объекта управления; допустимые пределы модернизации и развития системы; вероятностно-временные характеристики, при которых сохраняется целевое назначение системы.
  </p>
  <select id="concl_17" name="concl_17" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
    <option value="Имеется">Имеется</option>
    <option value="Отсутствует">Отсутствует</option>
    <option value="Не требуется">Не требуется</option>
  </select>
  </div>

  <hr style="border-top: 2px solid #333;">
  <div style="display: flex; align-items: center; margin-bottom: 10px;">
    <p style="margin-right: 900px; font-size: 16px; flex: 1;">6. Требования к эргономике и технической эстетике</p>
    <select id="concl_18" name="concl_18" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
      <option value="Имеется">Имеется</option>
      <option value="Отсутствует">Отсутствует</option>
      <option value="Не требуется">Не требуется</option>
    </select>
  </div>

  <hr style="border-top: 2px solid #333;">
  <div style="display: flex; align-items: center; margin-bottom: 10px;">
    <p style="margin-right: 900px; font-size: 16px; flex: 1;">7. Требования к эксплуатации, техническому обслуживанию, ремонту и хранению компонентов системы - условия и регламент (режим) эксплуатации, которые должны обеспечивать использование технических средств (ТС) системы с заданными техническими показателями, в том числе виды и периодичность обслуживания ТС системы или допустимость работы без обслуживания; - предварительные требования к допустимым площадям для размещения персонала и ТС системы, к параметрам сетей энергоснабжения и т. п.; - требования по количеству, квалификации обслуживающего персонала и режимам его работы; - требования к составу, размещению и условиям хранения комплекта запасных изделий и приборов; - требования к регламенту обслуживания.</p>
    <select id="concl_19" name="concl_19" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
      <option value="Имеется">Имеется</option>
      <option value="Отсутствует">Отсутствует</option>
      <option value="Не требуется">Не требуется</option>
    </select>
  </div>

  <hr style="border-top: 2px solid #333;">
  <div style="display: flex; align-items: center; margin-bottom: 10px;">
    <p style="margin-right: 900px; font-size: 16px; flex: 1;">8. Требования к защите информации от несанкционированного доступа</p>
    <select id="concl_20" name="concl_20" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
      <option value="Имеется">Имеется</option>
      <option value="Отсутствует">Отсутствует</option>
      <option value="Не требуется">Не требуется</option>
    </select>
  </div>

  <hr style="border-top: 2px solid #333;">
  <div style="display: flex; align-items: center; margin-bottom: 10px;">
    <p style="margin-right: 900px; font-size: 16px; flex: 1;">9. Требования по сохранности информации при авариях</p>
    <select id="concl_21" name="concl_21" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
      <option value="Имеется">Имеется</option>
      <option value="Отсутствует">Отсутствует</option>
      <option value="Не требуется">Не требуется</option>
    </select>
  </div>

  <hr style="border-top: 2px solid #333;">
  <div style="display: flex; align-items: center; margin-bottom: 10px;">
    <p style="margin-right: 900px; font-size: 16px; flex: 1;">10. Требования к защите от влияния внешних воздействий - требования к радиоэлектронной защите средств АС; - требования по стойкости, устойчивости и прочности к внешним воздействиям (среде применения).</p>
    <select id="concl_22" name="concl_22" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
      <option value="Имеется">Имеется</option>
      <option value="Отсутствует">Отсутствует</option>
      <option value="Не требуется">Не требуется</option>
    </select>
  </div>

  <hr style="border-top: 2px solid #333;">
  <div style="display: flex; align-items: center; margin-bottom: 10px;">
    <p style="margin-right: 900px; font-size: 16px; flex: 1;">11. Требования к патентной чистоте</p>
    <select id="concl_23" name="concl_23" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
      <option value="Имеется">Имеется</option>
      <option value="Отсутствует">Отсутствует</option>
      <option value="Не требуется">Не требуется</option>
    </select>
  </div>

  <hr style="border-top: 2px solid #333;">
  <div style="display: flex; align-items: center; margin-bottom: 10px;">
    <p style="margin-right: 900px; font-size: 16px; flex: 1;">12. Требования по стандартизации и унификации</p>
    <select id="concl_24" name="concl_24" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
      <option value="Имеется">Имеется</option>
      <option value="Отсутствует">Отсутствует</option>
      <option value="Не требуется">Не требуется</option>
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
    <select id="concl_25" name="concl_25" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
      <option value="Имеется">Имеется</option>
      <option value="Отсутствует">Отсутствует</option>
      <option value="Не требуется">Не требуется</option>
    </select>
  </div>

  <hr style="border-top: 2px solid #333;">
  <div style="display: flex; align-items: center; margin-bottom: 10px;">
    <p style="margin-right: 900px; flex: 1;">При создании системы в две или более очереди - перечень функциональных подсистем, отдельных функций или задач, вводимых в действие в 1-й и последующих очередях</p>
    <select id="concl_26" name="concl_26" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
      <option value="Имеется">Имеется</option>
      <option value="Отсутствует">Отсутствует</option>
      <option value="Не требуется">Не требуется</option>
    </select>
  </div>

  <hr style="border-top: 2px solid #333;">
  <div style="display: flex; align-items: center; margin-bottom: 10px;">
    <p style="margin-right: 900px; flex: 1;">Временной регламент реализации каждой функции, задачи (или комплекса задач)</p>
    <select id="concl_27" name="concl_27" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
      <option value="Имеется">Имеется</option>
      <option value="Отсутствует">Отсутствует</option>
      <option value="Не требуется">Не требуется</option>
    </select>
  </div>

  <hr style="border-top: 2px solid #333;">
  <div style="display: flex; align-items: center; margin-bottom: 10px;">
    <p style="margin-right: 900px; flex: 1;">Требования к форме представления выходной информации, к качеству реализации исполнения каждой функции (задачи или комплекса задач), характеристики необходимой точности и времени выполнения, требования одновременности выполнения группы функций, достоверности выдачи результатов</p>
    <select id="concl_28" name="concl_28" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
      <option value="Имеется">Имеется</option>
      <option value="Отсутствует">Отсутствует</option>
      <option value="Не требуется">Не требуется</option>
    </select>
  </div>

  <hr style="border-top: 2px solid #333;">
  <div style="display: flex; align-items: center; margin-bottom: 10px;">
    <p style="margin-right: 900px; flex: 1;">Перечень и критерии отказов для каждой функции, по которой задаются требования по надежности</p>
    <select id="concl_29" name="concl_29" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
      <option value="Имеется">Имеется</option>
      <option value="Отсутствует">Отсутствует</option>
      <option value="Не требуется">Не требуется</option>
    </select>
  </div>
</div>    

<!-------------------------------------------------------------------------------------------------------------------->

<div style="padding: 20px; border: 1px solid #ccc; border-radius: 10px; margin-bottom: 20px;">
    <p><b>4.5 Проверка подраздела «Требования к видам обеспечения» раздела «Требования к системе»</b></p>
  <hr style="border-top: 2px solid #333;">
  <div style="display: flex; align-items: center; margin-bottom: 10px;">
    <p style="margin-right: 10px; flex: 1;">Требование к математическому обеспечению</p>
    <select id="concl_30" name="concl_30" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
      <option value="Имеется">Имеется</option>
      <option value="Отсутствует">Отсутствует</option>
      <option value="Не требуется">Не требуется</option>
    </select>
  </div>

  <hr style="border-top: 2px solid #333;">
  <div style="display: flex; align-items: center; margin-bottom: 10px;">
    <p style="margin-right: 10px; flex: 1;">Требование к информационному обеспечению</p>
    <select id="concl_31" name="concl_31" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
      <option value="Имеется">Имеется</option>
      <option value="Отсутствует">Отсутствует</option>
      <option value="Не требуется">Не требуется</option>
    </select>
  </div>

  <hr style="border-top: 2px solid #333;">
  <div style="display: flex; align-items: center; margin-bottom: 10px;">
    <p style="margin-right: 10px; flex: 1;">Требование к лингвистическому обеспечению</p>
    <select id="concl_32" name="concl_32" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
      <option value="Имеется">Имеется</option>
      <option value="Отсутствует">Отсутствует</option>
      <option value="Не требуется">Не требуется</option>
    </select>
  </div>

  <hr style="border-top: 2px solid #333;">
  <div style="display: flex; align-items: center; margin-bottom: 10px;">
    <p style="margin-right: 10px; flex: 1;">Требование к программному обеспечению</p>
    <select id="concl_33" name="concl_33" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
      <option value="Имеется">Имеется</option>
      <option value="Отсутствует">Отсутствует</option>
      <option value="Не требуется">Не требуется</option>
    </select>
  </div>

  <hr style="border-top: 2px solid #333;">
  <div style="display: flex; align-items: center; margin-bottom: 10px;">
    <p style="margin-right: 10px; flex: 1;">Требование к техническому обеспечению</p>
    <select id="concl_34" name="concl_34" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
      <option value="Имеется">Имеется</option>
      <option value="Отсутствует">Отсутствует</option>
      <option value="Не требуется">Не требуется</option>
    </select>
  </div>

  <hr style="border-top: 2px solid #333;">
  <div style="display: flex; align-items: center; margin-bottom: 10px;">
    <p style="margin-right: 10px; flex: 1;">Требование к метрологическому обеспечению</p>
    <select id="concl_35" name="concl_35" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
      <option value="Имеется">Имеется</option>
      <option value="Отсутствует">Отсутствует</option>
      <option value="Не требуется">Не требуется</option>
    </select>
  </div>

  <hr style="border-top: 2px solid #333;">
  <div style="display: flex; align-items: center; margin-bottom: 10px;">
    <p style="margin-right: 10px; flex: 1;">Требование к организационному, методическому и другим видам обеспечения системы</p>
    <select id="concl_36" name="concl_36" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
      <option value="Имеется">Имеется</option>
      <option value="Отсутствует">Отсутствует</option>
      <option value="Не требуется">Не требуется</option>
    </select>
  </div>
</div>


<!-------------------------------------------------------------------------------------------------------------------->

<div style="padding: 20px; border: 1px solid #ccc; border-radius: 10px; margin-bottom: 20px;">
    <p><b>4.6 Проверка раздела «Состав и содержание работ по созданию/модификации системы»</b></p>
    <hr style="border-top: 2px solid #333;">
    <div style="display: flex; align-items: center; margin-bottom: 10px;">
    <p style="margin-right: 900px; flex: 1;">Перечень стадий и этапов работ по созданию системы в соответствии с ГОСТ 34.601, сроки их выполнения, перечень организаций - исполнителей работ, ссылки на документы, подтверждающие согласие этих организаций на участие в создании системы, или запись, определяющую ответственного (заказчик или разработчик) за проведение этих работ</p>
    <select id="concl_37" name="concl_37" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
      <option value="Имеется">Имеется</option>
      <option value="Отсутствует">Отсутствует</option>
      <option value="Не требуется">Не требуется</option>
    </select>
  </div>

  <hr style="border-top: 2px solid #333;">
  <div style="display: flex; align-items: center; margin-bottom: 10px;">
    <p style="margin-right: 900px; flex: 1;">Перечень документов, предъявляемых по окончании соответствующих стадий и этапов работ</p>
    <select id="concl_38" name="concl_38" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
      <option value="Имеется">Имеется</option>
      <option value="Отсутствует">Отсутствует</option>
      <option value="Не требуется">Не требуется</option>
    </select>
  </div>

  <hr style="border-top: 2px solid #333;">
  <div style="display: flex; align-items: center; margin-bottom: 10px;">
    <p style="margin-right: 900px; flex: 1;">Вид и порядок проведения экспертизы технической документации (стадия, этап, объем проверяемой документации, организация-эксперт)</p>
    <select id="concl_39" name="concl_39" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
      <option value="Имеется">Имеется</option>
      <option value="Отсутствует">Отсутствует</option>
      <option value="Не требуется">Не требуется</option>
    </select>
  </div>

  <hr style="border-top: 2px solid #333;">
  <div style="display: flex; align-items: center; margin-bottom: 10px;">
    <p style="margin-right: 900px; flex: 1;">Программа работ, направленных на обеспечение требуемого уровня надежности разрабатываемой системы (при необходимости)</p>
    <select id="concl_40" name="concl_40" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
      <option value="Имеется">Имеется</option>
      <option value="Отсутствует">Отсутствует</option>
      <option value="Не требуется">Не требуется</option>
    </select>
  </div>

  <hr style="border-top: 2px solid #333;">
  <div style="display: flex; align-items: center; margin-bottom: 10px;">
    <p style="margin-right: 900px; flex: 1;">Перечень работ по метрологическому обеспечению на всех стадиях создания системы с указанием их сроков выполнения и организаций-исполнителей (при необходимости)</p>
    <select id="concl_41" name="concl_41" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
      <option value="Имеется">Имеется</option>
      <option value="Отсутствует">Отсутствует</option>
      <option value="Не требуется">Не требуется</option>
    </select>
  </div>
</div>

<div style="padding: 20px; border: 1px solid #ccc; border-radius: 10px; margin-bottom: 20px;">
    <p><b>4.7 Проверка раздела «Порядок контроля и приемки системы»</b></p>
  <hr style="border-top: 2px solid #333;">
  <div style="display: flex; align-items: center; margin-bottom: 10px;">
    <p style="margin-right: 900px; flex: 1;">В процессе верификации должны проверяться следующие условия: 1) непротиворечивость требований к системе и степень учета потребностей пользователей; 2) возможности поставщика выполнять заданные требования; 3) корректность описания в проектных спецификациях входных и выходных данных, последовательности событий, интерфейсов, логики и т.д.; 4) соответствие кода проектным спецификациям и требованиям; 5) тестируемость и корректность кода, его соответствие принятым стандартам кодирования; 6) корректность интеграция компонентов АС в единую систему; 7) адекватность, полнота и непротиворечивость документации</p>
    <select id="concl_42" name="concl_42" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
      <option value="Имеется">Имеется</option>
      <option value="Отсутствует">Отсутствует</option>
      <option value="Не требуется">Не требуется</option>
    </select>
  </div>

  <hr style="border-top: 2px solid #333;">
  <div style="display: flex; align-items: center; margin-bottom: 10px;">
    <p style="margin-right: 900px; flex: 1;">Аттестация - полное соответствие АС спецификациям, требованиям и документации, представленной в ТЗ, а также возможность его безопасного и надежного применения пользователем</p>
    <select id="concl_43" name="concl_43" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
      <option value="Имеется">Имеется</option>
      <option value="Отсутствует">Отсутствует</option>
      <option value="Не требуется">Не требуется</option>
    </select>
  </div>

  <hr style="border-top: 2px solid #333;">
  <div style="display: flex; align-items: center; margin-bottom: 10px;">
    <p style="margin-right: 900px; flex: 1;">Совместная проверка - контроль планирования и управления ресурсами, персоналом, аппаратурой и инструментальными средствами проекта</p>
    <select id="concl_44" name="concl_44" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
      <option value="Имеется">Имеется</option>
      <option value="Отсутствует">Отсутствует</option>
      <option value="Не требуется">Не требуется</option>
    </select>
  </div>

  <hr style="border-top: 2px solid #333;">
  <div style="display: flex; align-items: center; margin-bottom: 10px;">
    <p style="margin-right: 900px; flex: 1;">Аудит - установления соответствия реальных работ и отчетов требованиям, планам и условиям договора</p>
    <select id="concl_45" name="concl_45" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
      <option value="Имеется">Имеется</option>
      <option value="Отсутствует">Отсутствует</option>
      <option value="Не требуется">Не требуется</option>
    </select>
  </div>

  <hr style="border-top: 2px solid #333;">
  <div style="display: flex; align-items: center; margin-bottom: 10px;">
    <p style="margin-right: 900px; flex: 1;">Разрешение проблем - анализ и решение проблем (включая обнаруженные несоответствия) независимо от их происхождения или источника, которые обнаружены в ходе разработки, эксплуатации, сопровождения или других процессов. Каждая обнаруженная проблема должна быть идентифицирована, описана, проанализирована и разрешена</p>
    <select id="concl_46" name="concl_46" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
      <option value="Имеется">Имеется</option>
      <option value="Отсутствует">Отсутствует</option>
      <option value="Не требуется">Не требуется</option>
    </select>
  </div>

  <hr style="border-top: 2px solid #333;">
  <div style="display: flex; align-items: center; margin-bottom: 10px;">
    <p style="margin-right: 900px; flex: 1;">Приемка работ по стадиям должна включать перечень участвующих предприятий и организаций, место и сроки проведения, порядок согласования и утверждения приемочной документации, а также статус приемочной комиссии (государственная, межведомственная, ведомственная и т.п.)</p>
    <select id="concl_47" name="concl_47" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
      <option value="Имеется">Имеется</option>
      <option value="Отсутствует">Отсутствует</option>
      <option value="Не требуется">Не требуется</option>
    </select>
  </div>
</div>


<div style="padding: 20px; border: 1px solid #ccc; border-radius: 10px; margin-bottom: 20px;">
  <p><b>4.8 Проверка раздела «Требования к составу и содержанию работ по подготовке объекта автоматизации к вводу системы в действие»</b></p>
  <hr style="border-top: 2px solid #333;">
  <div style="display: flex; align-items: center; margin-bottom: 10px;">
    <p style="margin-right: 10px; flex: 1;">Приведение поступающей в систему информации (в соответствии с требованиями к информационному и лингвистическому обеспечению) к виду, пригодному для обработки с помощью ЭВМ.</p>
    <select id="concl_48" name="concl_48" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
      <option value="Имеется">Имеется</option>
      <option value="Отсутствует">Отсутствует</option>
      <option value="Не требуется">Не требуется</option>
    </select>
  </div>
  
  <hr style="border-top: 2px solid #333;">
  <div style="display: flex; align-items: center; margin-bottom: 10px;">
    <p style="margin-right: 10px; flex: 1;">Изменения, которые необходимо осуществить в объекте автоматизации.</p>
    <select id="concl_49" name="concl_49" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
      <option value="Имеется">Имеется</option>
      <option value="Отсутствует">Отсутствует</option>
      <option value="Не требуется">Не требуется</option>
    </select>
  </div>
  
  <hr style="border-top: 2px solid #333;">
  <div style="display: flex; align-items: center; margin-bottom: 10px;">
    <p style="margin-right: 10px; flex: 1;">Создание условий функционирования объекта автоматизации, при которых гарантируется соответствие создаваемой системы требованиям, содержащимся в ТЗ.</p>
    <select id="concl_50" name="concl_50" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
      <option value="Имеется">Имеется</option>
      <option value="Отсутствует">Отсутствует</option>
      <option value="Не требуется">Не требуется</option>
    </select>
  </div>
  
  <hr style="border-top: 2px solid #333;">
  <div style="display: flex; align-items: center; margin-bottom: 10px;">
    <p style="margin-right: 10px; flex: 1;">Создание необходимых для функционирования системы подразделений и служб.</p>
    <select id="concl_51" name="concl_51" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
      <option value="Имеется">Имеется</option>
      <option value="Отсутствует">Отсутствует</option>
      <option value="Не требуется">Не требуется</option>
    </select>
  </div>
  
  <hr style="border-top: 2px solid #333;">
  <div style="display: flex; align-items: center; margin-bottom: 10px;">
    <p style="margin-right: 10px; flex: 1;">Сроки и порядок комплектования штатов и обучения персонала.</p>
    <select id="concl_52" name="concl_52" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
      <option value="Имеется">Имеется</option>
      <option value="Отсутствует">Отсутствует</option>
      <option value="Не требуется">Не требуется</option>
    </select>
  </div>
</div> 

<!------------------------------------------------------------------------------------------>


<div style="padding: 20px; border: 1px solid #ccc; border-radius: 10px; margin-bottom: 20px;">
    <p><b>4.9 Проверка раздела «Требования к документированию»</b></p>
  <hr style="border-top: 2px solid #333;">
  <div style="display: flex; align-items: center; margin-bottom: 10px;">
    <p style="margin-right: 10px; flex: 1;">Согласованный разработчиком и заказчиком системы перечень подлежащих разработке комплектов и видов документов, соответствующих требованиям НТД отрасли заказчика.</p>
    <select id="concl_53" name="concl_53" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
      <option value="Имеется">Имеется</option>
      <option value="Отсутствует">Отсутствует</option>
      <option value="Не требуется">Не требуется</option>
    </select>
  </div>

  <hr style="border-top: 2px solid #333;">
  <div style="display: flex; align-items: center; margin-bottom: 10px;">
    <p style="margin-right: 10px; flex: 1;">Перечень документов, выпускаемых на машинных носителях.</p>
    <select id="concl_54" name="concl_54" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
      <option value="Имеется">Имеется</option>
      <option value="Отсутствует">Отсутствует</option>
      <option value="Не требуется">Не требуется</option>
    </select>
  </div>

  <hr style="border-top: 2px solid #333;">
  <div style="display: flex; align-items: center; margin-bottom: 10px;">
    <p style="margin-right: 10px; flex: 1;">Требования по документированию комплектующих элементов межотраслевого применения в соответствии с требованиями ЕСКД и ЕСПД.</p>
    <select id="concl_55" name="concl_55" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
      <option value="Имеется">Имеется</option>
      <option value="Отсутствует">Отсутствует</option>
      <option value="Не требуется">Не требуется</option>
    </select>
  </div>

  <hr style="border-top: 2px solid #333;">
  <div style="display: flex; align-items: center; margin-bottom: 10px;">
    <p style="margin-right: 10px; flex: 1;">При отсутствии государственных стандартов, определяющих требования к документированию элементов системы, дополнительно включают требования к составу и содержанию таких документов.</p>
    <select id="concl_56" name="concl_56" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
      <option value="Имеется">Имеется</option>
      <option value="Отсутствует">Отсутствует</option>
      <option value="Не требуется">Не требуется</option>
    </select>
  </div>
</div>


  <!------------------------------------------------------------------------------------------>


<div style="padding: 20px; border: 1px solid #ccc; border-radius: 10px; margin-bottom: 20px;">
    <p><b>4.10 Проверка раздела «Источники разработки»</b></p>
  <hr style="border-top: 2px solid #333;">
  <div style="display: flex; align-items: center; margin-bottom: 10px;">
    <p style="margin-right: 900px; flex: 1;">Должны быть перечислены документы и информационные материалы (технико-экономическое обоснование, отчеты о законченных научно-исследовательских работах, информационные материалы на отечественные, зарубежные системы-аналоги и др.), на основании которых разрабатывалось ТЗ и которые должны быть использованы при создании системы.</p>
    <select id="concl_57" name="concl_57" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; cursor: pointer; width: 200px;">
      <option value="Имеется">Имеется</option>
      <option value="Отсутствует">Отсутствует</option>
      <option value="Не требуется">Не требуется</option>
    </select>
  </div>
</div>

<div style="padding: 20px; border: 1px solid #ccc;border-radius: 10px; margin-bottom: 20px;">
    <p><b style="font-size: 18px; color: #333;">Выводы и рекомендации</b></p>
    <hr style="border-top: 2px solid #333; margin: 10px 0;">
    <div style="display: flex; align-items: center;">
      <p style="margin-right: 20px; color: #666;">Заключение</p>
      <textarea id="concl_58" name="concl_58" style="margin-left: 105px; width: 700px; height: 100px; border: 1px solid #ccc;"></textarea>
    </div>
</div>
  
<div style="padding: 20px; border: 1px solid #ccc;border-radius: 10px; margin-bottom: 20px;">
    <p><b style="font-size: 18px; color: #333;">Заключение на соответствие требованиям информационной безопасности</b></p>
    <hr style="border-top: 2px solid #333; margin: 10px 0;">
    <div style="display: flex; align-items: center;">
      <p style="margin-right: 20px; color: #666;">Заключение</p>
      <textarea id="concl_59" name="concl_59" style="margin-left: 105px; width: 700px; height: 100px; border: 1px solid #ccc;"></textarea>
    </div>
</div>


<?php if(auth()->user()->hasRole('ROLE_GO_EXPERTISE_SIGNER') || auth()->user()->hasRole('ROLE_GO_EXPERTISE_EDITOR') || auth()->user()->hasRole('ROLE_GO_EXPERTISE_CONFIRMER')): ?>
<h2 class="is-content-title">При необходимости укажите комментарий</h2>
<textarea class="form__field" style="overflow-y: scroll !important; min-height: 300px;" id="comment" name="comment"><?php echo e($expertise->comment_discart); ?> <?php echo e($expertise->comment_accept); ?></textarea>
<?php endif; ?>



<?php
  $users = App\Models\User::all(); // Получаем всех пользователей
?>
<?php if(auth()->check() && auth()->user()->hasRole('ROLE_UO_EXPERTISE_DANA')): ?> 
  <?php if(auth()->check() && auth()->user()->hasRole('ROLE_UO_EXPERTISE_DANA') && $expertise->accept_uo_reviewer == 1): ?>
    <div class="is-checkboxes">
      <label class="toggle-checkbox">
        <input type="checkbox" id="send_to_si" name="send_to_si" checked>
        <span></span>
        <p style="color: #000000; font-size: 16px;"><b>Уведомить СИ</b></p>
      </label>
    </div> 
    <div class="is-checkboxes">
      <label class="toggle-checkbox">
        <input type="checkbox" id="send_to_kib" name="send_to_kib" checked>
        <span></span>
        <p style="color: #000000; font-size: 16px;"><b>Уведомить КИБ</b></p>
      </label>
    </div>
  <?php endif; ?>   
<?php if(auth()->check() && auth()->user()->hasRole('ROLE_UO_EXPERTISE_DANA') && $expertise->accept_uo_reviewer == 0): ?>
    <label for="send_to_mcriap_executor">Выбрать исполнителя:</label>
    <select id="send_to_mcriap_executor" name="send_to_mcriap_executor" style="width: 100%; padding: 8px 12px; margin-bottom: 15px;">
      <option value="" selected disabled>Выбрать исполнителя</option>
       
       <option>Мурат Ахатай</option>
  </select>
<?php endif; ?> 
<?php endif; ?>

<?php if(auth()->check() && (auth()->user()->hasRole('ROLE_SI_EXPERTISE_CONFIRMER') || auth()->user()->hasRole('ROLE_KIB_EXPERTISE_CONFIRMER'))): ?>
    <form class="form" enctype="multipart/form-data" method="POST" action="<?php echo e(route('expertise.store')); ?>">
      <?php echo csrf_field(); ?>
      <input type="hidden" id="approver_id1" name="approver_id1">  
        <!-- Поле "Согласующий" -->
        <?php if(auth()->user()->hasRole('ROLE_SI_EXPERTISE_CONFIRMER') && $expertise->send_to_si == 1 && $expertise->send_to_si_reviewers == 0 && $expertise->accept_si_reviewers != 1): ?>
        <h2>Отправка заявки</h2>
            <label for="approver1">Выбрать исполнителя</label>
            <select id="approver1" name="approver_id1" style="width: 100%; padding: 8px 12px; margin-bottom: 15px; margin-top: 10px;">
                <option selected disabled>Выберите исполнителя</option>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($user->hasRole('ROLE_SI_EXPERTISE_REVIEWER')): ?>
                        <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?> <?php echo e($user->surname); ?> <?php echo e($user->middlename); ?></option>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <button class="btn" type="submit" id="send_to" name="send_to" style="font-size: 14px; background: #0178BC;">Отправить</button>
        <?php endif; ?>

        
          <?php if(auth()->user()->hasRole('ROLE_SI_EXPERTISE_CONFIRMER') && $expertise->accept_si_reviewers == 1): ?> 
            <?php if(auth()->user()->id == 2669 && $expertise->accept_si_confirmer_first == 0): ?>
                <input type="hidden" name="expertise_id" id="expertise_id" value="<?php echo e($expertise->id); ?>">
                <button class="btn" type="submit" id="accept_si_confirmer_first" name="accept_si_confirmer_first" style="display: none; font-size: 14px; background: #0178BC;">Согласовать</button>
            <?php endif; ?>

            <?php if(auth()->user()->id == 15 && $expertise->accept_si_confirmer_second == 0): ?>
                <input type="hidden" name="expertise_id" id="expertise_id" value="<?php echo e($expertise->id); ?>">
                <button class="btn" type="submit" id="accept_si_confirmer_second" name="accept_si_confirmer_second" style="display: none; font-size: 14px; background: #0178BC;">Согласовать</button>
            <?php endif; ?>
          <?php endif; ?>

<?php endif; ?>


<?php if(auth()->user()->hasRole('ROLE_GO_EXPERTISE_SIGNER') && $expertise->send_to_go_signer == 1): ?>
    <input type="hidden" name="expertise_id" id="expertise_id" value="<?php echo e($expertise->id); ?>">
    <button class="btn" type="submit" id="create_and_send_to_dana" name="create_and_send_to_dana" style="display: none; font-size: 14px; background: #0178BC;">Отправить в УО</button>
<?php endif; ?>
<div class="buttons-wrapper">
  <?php if(auth()->user()->hasRole('ROLE_GO_EXPERTISE_CONFIRMER') && $expertise->send == 1): ?>
  <input type="hidden" name="expertise_id" id="expertise_id" value="<?php echo e($expertise->id); ?>">
  <button type="submit" name="discart_gos" id="discart_gos" style="display: block; font-size: 14px; background: #b90404;">Вернуть</a>
  <?php endif; ?>
</div>
<div class="buttons-wrapper">
  <?php if(auth()->user()->hasRole('ROLE_SI_EXPERTISE_REVIEWER') && $expertise->send_to_si_reviewers == 1): ?>
      <button class="btn" type="submit" id="save_si_reviewer" name="save_si_reviewer" style="display: block; font-size: 14px; background: #0178BC; margin-bottom: 10px;">Сохранить заключения</button>
      <input type="hidden" name="expertise_id" id="expertise_id" value="<?php echo e($expertise->id); ?>">
      
      <select id="signer_id" name="signer_id" style="width: 100%; padding: 8px 12px;">
      <option selected disabled>Выберите Подписывающего</option>
      <td><span style="font-size: 20px; color: #FF6A97">*</span></td>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($user->hasRole('ROLE_SI_EXPERTISE_SIGNER')): ?>
                <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?> <?php echo e($user->surname); ?> <?php echo e($user->middlename); ?></option>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </select>
      <button class="btn" type="submit" id="accept_si_reviewer" name="accept_si_reviewer" style="display: none; font-size: 14px; background: #0178BC;">Отправить на согласование</button>
      <?php endif; ?>
</div>
  <div class="buttons-wrapper">
      <?php if(auth()->user()->hasRole('ROLE_GTS_EXPERTISE_CONFIRMER') && $expertise->send_to_gts == 1 && $expertise->accept_gts_reviewers == 0): ?>
              
        <div id="approvers-container">
          <!-- Сюда будут добавляться селекты -->
        </div>
              
        <button class="btn" type="submit" id="send_to_gts_executors" name="send_to_gts_executors" style="font-size: 14px; background: #0178BC;">Отправить</button>
      <?php endif; ?>

      <?php if(auth()->user()->hasRole('ROLE_GTS_EXPERTISE_CONFIRMER') && $expertise->accept_gts_reviewers == 1): ?>
      <input type="hidden" name="expertise_id" id="expertise_id" value="<?php echo e($expertise->id); ?>">
      <button class="btn"  id="accept_gts_confirmer" name="accept_gts_confirmer" style="font-size: 14px; background: #00317B;">Согласовать</button>
      <?php endif; ?>

    <?php if(auth()->user()->hasRole('ROLE_GTS_EXPERTISE_REVIEWER')): ?>
      <input type="hidden" name="expertise_id" id="expertise_id" value="<?php echo e($expertise->id); ?>">

      <div id="signer-container">
        <!-- Сюда будут добавляться селекты -->
      </div>

      <div id="app-container">
        <!-- Сюда будут добавляться селекты -->
      </div>

      <button class="btn"  id="save_gts_reviewer" name="save_gts_reviewer" style="font-size: 14px; background: #00317B;">Сохранить заключения</button>
      <button class="btn"  id="accept_gts_reviewer" name="accept_gts_reviewer" style="font-size: 14px; background: #00317B;">Отправить на согласование</button>
    <?php endif; ?>
    
    <?php if(auth()->user()->hasRole('ROLE_UO_EXPERTISE_REVIEWER')): ?>
      <?php if($expertise->send_to_uo_si == 1 && $expertise->send_to_uo_gts == 1): ?>
        <input type="hidden" name="expertise_id" id="expertise_id" value="<?php echo e($expertise->id); ?>">

        <div id="signerUo-container">
          <!-- Сюда будут добавляться селекты -->
        </div>

        <div id="appUo-container">
          <!-- Сюда будут добавляться селекты -->
        </div>

        <button class="btn"  id="save_uo_reviewer" name="save_uo_reviewer" style="font-size: 14px; background: #00317B;">Сохранить заключения</button>
        <button class="btn"  id="accept_uo_reviewer_concl" name="accept_uo_reviewer_concl" style="font-size: 14px; background: #00317B;">Отправить на согласование</button>
      <?php endif; ?>  
    <?php endif; ?>


    <?php if(auth()->user()->hasRole('ROLE_GO_EXPERTISE_CONFIRMER') && $expertise->send == 1): ?>
        <button  class="btn" id='approve_go' name="approve_go" style="display:block; font-size: 14px; background: #00317B;">Согласовать</button>
    <?php endif; ?>

    <?php if(auth()->user()->hasRole('ROLE_UO_EXPERTISE_DANA') && $expertise->send_to_uo == 1 && $expertise->accept_uo_reviewer == 0 ): ?> 
    <input type="hidden" name="expertise_id" id="expertise_id" value="<?php echo e($expertise->id); ?>">
    <button class="btn" id='send_to_uo_reviewer' name="send_to_uo_reviewer" style="font-size: 14px; background: #00317B;">Отправить к исполнителю</button>
    <?php endif; ?>

    <?php if(auth()->user()->hasRole('ROLE_UO_EXPERTISE_REVIEWER') && $expertise->send_to_uo_reviewer == 1): ?> 
    <input type="hidden" name="expertise_id" id="expertise_id" value="<?php echo e($expertise->id); ?>">
    <button class="btn" id="discart_uo_reviewer" name="discart_uo_reviewer" style="font-size: 14px; background: #b90404;">Вернуть</a>
    <button class="btn" id="accept_uo_reviewer" name="accept_uo_reviewer" style="font-size: 14px; background: #00317B;">Принять</button>
    <?php endif; ?>

    <?php if(auth()->user()->hasRole('ROLE_UO_EXPERTISE_DANA') && $expertise->accept_uo_reviewer == 1): ?>
      <input type="hidden" name="expertise_id" id="expertise_id" value="<?php echo e($expertise->id); ?>">
      <button class="btn" id="send_to_confirmers" name="send_to_confirmers" style="font-size: 14px; background: #00317B;">Отправить</button>
    <?php endif; ?>

    <?php if(auth()->user()->hasRole('ROLE_KIB_EXPERTISE_EXECUTOR')): ?>
        <input type="hidden" name="expertise_id" id="expertise_id" value="<?php echo e($expertise->id); ?>">
        <button class="btn" type="submit" name="send_to_gts" id="send_to_gts"  style="font-size: 14px; background: #00317B;">Отправить ГТС</a>
    <?php endif; ?>

    <?php if(auth()->user()->hasRole('ROLE_SI_EXPERTISE_SIGNER') && $expertise->send_to_si_signer == 1): ?>
      <input type="hidden" name="expertise_id" id="expertise_id" value="<?php echo e($expertise->id); ?>">
      <button class="btn" id="" name=""  style="font-size: 14px; background: #b90404;">Вернуть</button>
      <button class="btn" id="send_to_uo_si" name="send_to_uo_si"  style="font-size: 14px; background: #00317B;">Отправить в УО</button>
    <?php endif; ?>

    <?php if(auth()->user()->hasRole('ROLE_GTS_EXPERTISE_SIGNER') && $expertise->send_to_gts_signer == 1): ?>
      <input type="hidden" name="expertise_id" id="expertise_id" value="<?php echo e($expertise->id); ?>">
      <button class="btn" id="" name=""  style="font-size: 14px; background: #b90404;">Вернуть</button>
      <button class="btn" id="send_to_uo_gts" name="send_to_uo_gts"  style="font-size: 14px; background: #00317B;">Отправить в УО</button>
    <?php endif; ?>

    <?php if(auth()->user()->hasRole('ROLE_UO_EXPERTISE_CONFIRMER') && $expertise->send_to_uo_confirmer == 1): ?>
      <input type="hidden" name="expertise_id" id="expertise_id" value="<?php echo e($expertise->id); ?>">
      <button class="btn" id="" name=""  style="font-size: 14px; background: #b90404;">Вернуть</button>
    <?php endif; ?>

    <?php if(auth()->user()->hasRole('ROLE_UO_EXPERTISE_SIGNER') && $expertise->accept_uo_to_confirm == 1): ?>
      <input type="hidden" name="expertise_id" id="expertise_id" value="<?php echo e($expertise->id); ?>">
      <button class="btn" id="" name=""  style="font-size: 14px; background: #b90404;">Вернуть</button>
      <button class="btn" id="send_to_go_fromUO" name="send_to_go_fromUO"  style="font-size: 14px; background: #00317B;">Отправить в ГО</button>
    <?php endif; ?>

    

    <?php if(auth()->user()->hasRole('ROLE_SI_EXPERTISE_CONFIRMER') && $expertise->accept_si_reviewers == 1): ?> 
            <?php if(auth()->user()->id == 2669 && $expertise->accept_si_confirmer_first == 0): ?>
            <input type="hidden" name="expertise_id" id="expertise_id" value="<?php echo e($expertise->id); ?>">
            <button class="btn" id="discart_si_confirmer" name="discart_si_confirmer"  style="font-size: 14px; background: #b90404;">Вернуть</button>
            <?php endif; ?>

            <?php if(auth()->user()->id == 15 && $expertise->accept_si_confirmer_second == 0): ?>
            <input type="hidden" name="expertise_id" id="expertise_id" value="<?php echo e($expertise->id); ?>">
            <button class="btn" id="discart_si_confirmer" name="discart_si_confirmer"  style="font-size: 14px; background: #b90404;">Вернуть</button>
            <?php endif; ?>
    <?php endif; ?>

     
    <?php if(auth()->user()->hasRole('ROLE_GTS_EXPERTISE_CONFIRMER')): ?>
      <input type="hidden" name="expertise_id" id="expertise_id" value="<?php echo e($expertise->id); ?>">
      <button class="btn" id="discart_gts_confirmer" name="discart_gts_confirmer"  style="font-size: 14px; background: #b90404;">Вернуть</button>
    <?php endif; ?>
    
  </div>
</form>





<div class="buttons-wrapper">

   <?php if(auth()->user()->hasRole('ROLE_GO_EXPERTISE_SIGNER') && $expertise->send_to_go_signer == 1): ?>
        <input type="hidden" name="expertise_id" id="expertise_id" value="<?php echo e($expertise->id); ?>">
        <button  class="btn" id='sign_ecp_button' name="sign_ecp_button" onclick="acceptPassportGO()" style="font-size: 14px; background: #00317B;">Подписать</button>
    <?php endif; ?>
  

  

  

  

  

  

  <?php if(auth()->user()->hasRole('ROLE_SI_EXPERTISE_REVIEWER') && $expertise->send_to_si_reviewers == 1): ?>
    <input type="hidden" name="expertise_id" id="expertise_id" value="<?php echo e($expertise->id); ?>">
    <button class="btn" id='sign_si_ecp_button' name="sign_si_ecp_button" onclick="acceptPassportSI()" style="display: block; font-size: 14px; background: #0178BC;">Подписать кнопку</button>
  <?php endif; ?>

  <?php if(auth()->user()->hasRole('ROLE_SI_EXPERTISE_CONFIRMER') && $expertise->accept_si_reviewers == 1): ?> 
      <?php if(auth()->user()->id == 2669 && $expertise->accept_si_confirmer_first == 0): ?>
        <input type="hidden" name="expertise_id" id="expertise_id" value="<?php echo e($expertise->id); ?>">
        <button class="btn" id='sign_siCon_ecp_button' name="sign_siCon_ecp_button" onclick="acceptSIConfirmerFirst()" style="display: block; font-size: 14px; background: #0178BC;">Подписать кнопку</button>
      <?php endif; ?>

      <?php if(auth()->user()->id == 15 && $expertise->accept_si_confirmer_second == 0): ?>
        <input type="hidden" name="expertise_id" id="expertise_id" value="<?php echo e($expertise->id); ?>">
        <button class="btn" id='sign_siCon_ecp_button' name="sign_siCon_ecp_button" onclick="acceptSIConfirmerSecond()" style="display: block; font-size: 14px; background: #0178BC;">Подписать кнопку</button>
      <?php endif; ?>
  <?php endif; ?>


  <?php if(auth()->user()->hasRole('ROLE_GTS_EXPERTISE_CONFIRMER') && $expertise->send_to_gts == 1 && $expertise->accept_gts_reviewers == 0): ?>
      <button class='btn' id="add-approver-btn">Добавить исполнителя</button>
  <?php endif; ?>

  <?php if(auth()->user()->hasRole('ROLE_GTS_EXPERTISE_REVIEWER')): ?>
      <button class='btn' id="add-app-btn">Добавить Согласующего</button>
      <button class='btn' id="add-signer-btn">Добавить Подписанта</button>
  <?php endif; ?>

  <?php if(auth()->user()->hasRole('ROLE_UO_EXPERTISE_REVIEWER')): ?>
    <?php if($expertise->send_to_uo_si == 1 && $expertise->send_to_uo_gts == 1): ?>
      <button class='btn' id="add-appUo-btn">Добавить Согласующего</button>
      <button class='btn' id="add-signerUo-btn">Добавить Подписанта</button>
    <?php endif; ?>
  <?php endif; ?>

  <?php if(auth()->user()->hasRole('ROLE_GTS_EXPERTISE_REVIEWER')): ?>
      <input type="hidden" name="expertise_id" id="expertise_id" value="<?php echo e($expertise->id); ?>">
      <button class="btn" onclick="acceptGTSReviewer()"  style="font-size: 14px; background: #00317B;">Подписать</button>
  <?php endif; ?> 

  <?php if(auth()->user()->hasRole('ROLE_UO_EXPERTISE_REVIEWER')): ?>
    <?php if($expertise->send_to_uo_si == 1 && $expertise->send_to_uo_gts == 1): ?>
      <input type="hidden" name="expertise_id" id="expertise_id" value="<?php echo e($expertise->id); ?>">
      <button class="btn" onclick="acceptGTSReviewer()"  style="font-size: 14px; background: #00317B;">Подписать</button>
    <?php endif; ?>  
  <?php endif; ?>

  <?php if(auth()->user()->hasRole('ROLE_GTS_EXPERTISE_CONFIRMER') && $expertise->accept_gts_reviewers == 1): ?>
      <input type="hidden" name="expertise_id" id="expertise_id" value="<?php echo e($expertise->id); ?>">
      <button class="btn" onclick="acceptGtsConfirmer()"  style="font-size: 14px; background: #00317B;">Подписать</button>
  <?php endif; ?>

  <?php if(auth()->user()->hasRole('ROLE_SI_EXPERTISE_SIGNER') && $expertise->send_to_si_signer == 1): ?>
      <input type="hidden" name="expertise_id" id="expertise_id" value="<?php echo e($expertise->id); ?>">
      <button class="btn" onclick="acceptSiSigner()"  style="font-size: 14px; background: #00317B;">Подписать</button>
  <?php endif; ?>

  <?php if(auth()->user()->hasRole('ROLE_GTS_EXPERTISE_SIGNER') && $expertise->send_to_gts_signer == 1): ?>
      <input type="hidden" name="expertise_id" id="expertise_id" value="<?php echo e($expertise->id); ?>">
      <button class="btn" onclick="acceptGTSSigner()"  style="font-size: 14px; background: #00317B;">Подписать</button>
  <?php endif; ?>

  <?php if(auth()->user()->hasRole('ROLE_UO_EXPERTISE_CONFIRMER') && $expertise->send_to_uo_confirmer == 1): ?>
      <input type="hidden" name="expertise_id" id="expertise_id" value="<?php echo e($expertise->id); ?>">
      <button class="btn" onclick="acceptUOConfirmer()"  style="font-size: 14px; background: #00317B;">Подписать</button>
      <button class="btn" onclick="confirmUo()"  style="font-size: 14px; background: #00317B;">Согласовать</button>
  <?php endif; ?>

  <?php if(auth()->user()->hasRole('ROLE_UO_EXPERTISE_SIGNER') && $expertise->accept_uo_to_confirm == 1): ?>
      <input type="hidden" name="expertise_id" id="expertise_id" value="<?php echo e($expertise->id); ?>">
      <button class="btn" onclick="acceptUOSigner()"  style="font-size: 14px; background: #00317B;">Подписать</button>
  <?php endif; ?>

</div>  


<?php $__env->startSection('scripts'); ?>

<?php echo $__env->make('expertise.info.comments_scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script>

document.getElementById('signer-btn').addEventListener('click', function() {
        var container = document.getElementById('signers-container');
        var selectCount = container.getElementsByTagName('select').length + 1;

        var label = document.createElement('label');
        label.setAttribute('for', 'signer' + selectCount);
        label.textContent = 'Выбрать исполнителя';

        var select = document.createElement('select');
        select.setAttribute('id', 'signer' + selectCount);
        // select.setAttribute('name', 'approver_id' + selectCount);
        select.setAttribute('name', 'signer_id[]');
        select.style.width = '100%';
        select.style.padding = '8px 12px';
        select.style.marginBottom = '15px';

        var defaultOption = document.createElement('option');
        defaultOption.setAttribute('selected', 'selected');
        defaultOption.setAttribute('disabled', 'disabled');
        defaultOption.textContent = 'Выберите исполнителя';
        select.appendChild(defaultOption);

        // Добавление пользователей в селект
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($user->hasRole('ROLE_GTS_EXPERTISE_REVIEWER')): ?>
                var option = document.createElement('option');
                option.setAttribute('value', '<?php echo e($user->id); ?>');
                option.textContent = '<?php echo e($user->name); ?> <?php echo e($user->surname); ?> <?php echo e($user->middlename); ?>';
                select.appendChild(option);
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        container.appendChild(label);
        container.appendChild(select);
    });

</script>

<?php $__env->stopSection(); ?>





<?php /**PATH C:\Users\user\Documents\НОВЫЙ ПОРТАЛ\www\resources\views/expertise/info/comments.blade.php ENDPATH**/ ?>