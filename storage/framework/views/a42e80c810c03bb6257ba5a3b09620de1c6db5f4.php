<?php $__env->startSection('scripts'); ?>

<script>
function approveGo(expertiseId) {
    var token = $("input[name='_token']").val();
    var errorBox = document.getElementById("error_sign_box");
    var successBox = document.getElementById("success_sign_box");
    errorBox.style.display = "none";
    successBox.style.display = "none";
    $.ajax({
        url: "<?php echo e(route('expertise.approve.approve_go')); ?>",
        method: 'POST',
        dataType: "json",
        data: {
            _token: token,
            expertise_id: expertiseId
        },
        success: function (data) {
            if (data.options) {
              successBox.innerHTML = data.options;
              successBox.style.display = "block";
              errorBox.style.display = "none";
              approve_go.style.display="none";
              setTimeout(function() {
              window.location.href = "<?php echo e(route('expertise.approve')); ?>";
              }, 2000); 
            } else {
              alert('Ошибка при согласовании запроса.');
                // Здесь можно добавить код для обработки ошибки
            }
        },
        error: function () {
          alert('Ошибка при отправке запроса на сервер.');
            // Здесь можно добавить код для обработки ошибки
        }
    });
}



function sendToUoReviewer() {
    var token = $("input[name='_token']").val();
    var errorBox = document.getElementById("error_sign_box");
    var successBox = document.getElementById("success_sign_box");
    errorBox.style.display = "none";
    successBox.style.display = "none";
    var expertise_id = document.getElementById("expertise_id").value;
    var selectedExecutor = document.getElementById("send_to_mcriap_executor").value;

    $.ajax({
        url: "<?php echo e(route('expertise.approve.send_uo_reviewer')); ?>",
        method: 'POST',
        dataType: "json",
        data: {
            _token: token,
            expertise_id: expertise_id,
            send_to_mcriap_executor: selectedExecutor  // Передаем выбранного исполнителя
        },
        success: function(data) {
            successBox.innerHTML = data.options;
            successBox.style.display = "block";
            errorBox.style.display = "none";
        }
    });
}




function acceptUoReviewer() {
    var token = $("input[name='_token']").val();
    var errorBox = document.getElementById("error_sign_box");
    var successBox = document.getElementById("success_sign_box");
    errorBox.style.display = "none";
    successBox.style.display = "none";
    var expertise_id = document.getElementById("expertise_id").value;

    $.ajax({
        url: "<?php echo e(route('expertise.approve.accept_uo_reviewer')); ?>",
        method: 'POST',
        dataType: "json",
        data: {
            _token: token,
            expertise_id: expertise_id,
        },
        success: function(data) {
            successBox.innerHTML = data.options;
            successBox.style.display = "block";
            errorBox.style.display = "none";
        }
    });
}


function confirmUo() {
    var token = $("input[name='_token']").val();
    var errorBox = document.getElementById("error_sign_box");
    var successBox = document.getElementById("success_sign_box");
    errorBox.style.display = "none";
    successBox.style.display = "none";
    var expertise_id = document.getElementById("expertise_id").value;

    $.ajax({
        url: "<?php echo e(route('expertise.approve.accept_uo_confirm')); ?>",
        method: 'POST',
        dataType: "json",
        data: {
            _token: token,
            expertise_id: expertise_id,
        },
        success: function(data) {
            successBox.innerHTML = data.options;
            successBox.style.display = "block";
            errorBox.style.display = "none";
        }
    });
}




  function sendToConfirmers() {
    var token = $("input[name='_token']").val();
    var errorBox = document.getElementById("error_sign_box");
    var successBox = document.getElementById("success_sign_box");

    errorBox.style.display = "none";
    successBox.style.display = "none";
    var expertise_id = document.getElementById("expertise_id").value;


    $.ajax({
        url: "<?php echo e(route('expertise.approve.sendToConfirmers')); ?>",
        method: 'POST',
        dataType: "json",
        data: {
            _token: token,
            expertise_id: expertise_id,
        },
        success: function(data) {
            successBox.innerHTML = data.options;
            successBox.style.display = "block";
            errorBox.style.display = "none";
        }
    });




  }




function acceptPassportGO() {

var errorBox = document.getElementById("error_sign_box");
var successBox = document.getElementById("success_sign_box");

errorBox.style.display = "none";
successBox.style.display = "none";

console.log("Нажата кнопка подписания...");

var webSocket = new WebSocket('wss://127.0.0.1:13579/');
var callback = null;


webSocket.onopen = function (event) {
  console.log("Соединение открыто...");
  getKeyInfo("PKCS12", this);
};



webSocket.onclose = function (event) {
  if (event.wasClean) {
    console.log('Соединение было закрыто');
  } else {
    console.log('Ошибка соединения');
    errorBox.innerHTML = '<p>Обнаружена ошибка подключения к NCALayer на вашем устройстве. Возможно, NCALayer у вас не запущен, либо блокируется сторонними программами. Пожалуйста, убедитесь, что приложение NCALayer работает и повторите попытку заново.</p>';
    errorBox.style.display = "block";
    successBox.style.display = "none";
  }
  console.log('Код: ' + event.code + ' Причина: ' + event.reason);
};


webSocket.onmessage = function (event) {
  
  var result = JSON.parse(event.data);
  var token = $("input[name='_token']").val();
  var comment = document.getElementById("comment").value;

  var expertise_id = document.getElementById("expertise_id").value;

  
  
  

  
  if(result.responseObject) {
    var dataecp = result.responseObject;

    console.log(dataecp);


    $.ajax({
      url: "<?php echo e(route('expertise.approve.signecp')); ?>",
      method: 'POST',
      dataType: "json",
      data: {
        _comment: comment,
        _verify: dataecp,
        _token: token,
        _expertise_id: expertise_id,
      },
      success: function(data) {
        successBox.innerHTML = data.options;
        successBox.style.display = "block";
        errorBox.style.display = "none";
        create_and_send_to_dana.style.display="block"
        sign_ecp_button.style.display="none"
      }
    });
    //$("#ncalayerMFInfo").modal();
  }


};


function getKeyInfo(storageName, callBack) {
    var getKeyInfo = {
    "module": "kz.gov.pki.knca.commonUtils",
        "method": "getKeyInfo",
        "args": [storageName]
    };
    callback = callBack;
    webSocket.send(JSON.stringify(getKeyInfo));
    console.log('Хранилище определено как ' + storageName);
}




}




function acceptPassportSI() {

var errorBox = document.getElementById("error_sign_box");
var successBox = document.getElementById("success_sign_box");

errorBox.style.display = "none";
successBox.style.display = "none";

console.log("Нажата кнопка подписания...");

var webSocket = new WebSocket('wss://127.0.0.1:13579/');
var callback = null;


webSocket.onopen = function (event) {
  console.log("Соединение открыто...");
  getKeyInfo("PKCS12", this);
};



webSocket.onclose = function (event) {
  if (event.wasClean) {
    console.log('Соединение было закрыто');
  } else {
    console.log('Ошибка соединения');
    errorBox.innerHTML = '<p>Обнаружена ошибка подключения к NCALayer на вашем устройстве. Возможно, NCALayer у вас не запущен, либо блокируется сторонними программами. Пожалуйста, убедитесь, что приложение NCALayer работает и повторите попытку заново.</p>';
    errorBox.style.display = "block";
    successBox.style.display = "none";
  }
  console.log('Код: ' + event.code + ' Причина: ' + event.reason);
};


webSocket.onmessage = function (event) {
  
  var result = JSON.parse(event.data);
  var token = $("input[name='_token']").val();
  var expertise_id = document.getElementById("expertise_id").value;
 

if(result.responseObject) {
    var dataecp = result.responseObject;

    console.log(dataecp);


    $.ajax({
        url: "<?php echo e(route('expertise.approve.approve_si_reviewer')); ?>",
        method: 'POST',
        dataType: "json",
        data: {
            _token: token,
            expertise_id: expertise_id,
            _verify: dataecp

        },
        success: function(data) {
            successBox.innerHTML = data.options;
            successBox.style.display = "block";
            errorBox.style.display = "none";
            sign_si_ecp_button.style.display="none";
            accept_si_reviewer.style.display = "block";
        }
    });
  }


};


function getKeyInfo(storageName, callBack) {
    var getKeyInfo = {
    "module": "kz.gov.pki.knca.commonUtils",
        "method": "getKeyInfo",
        "args": [storageName]
    };
    callback = callBack;
    webSocket.send(JSON.stringify(getKeyInfo));
    console.log('Хранилище определено как ' + storageName);
}

}





function acceptSIConfirmerFirst() {

var errorBox = document.getElementById("error_sign_box");
var successBox = document.getElementById("success_sign_box");

errorBox.style.display = "none";
successBox.style.display = "none";

console.log("Нажата кнопка подписания...");

var webSocket = new WebSocket('wss://127.0.0.1:13579/');
var callback = null;


webSocket.onopen = function (event) {
  console.log("Соединение открыто...");
  getKeyInfo("PKCS12", this);
};



webSocket.onclose = function (event) {
  if (event.wasClean) {
    console.log('Соединение было закрыто');
  } else {
    console.log('Ошибка соединения');
    errorBox.innerHTML = '<p>Обнаружена ошибка подключения к NCALayer на вашем устройстве. Возможно, NCALayer у вас не запущен, либо блокируется сторонними программами. Пожалуйста, убедитесь, что приложение NCALayer работает и повторите попытку заново.</p>';
    errorBox.style.display = "block";
    successBox.style.display = "none";
  }
  console.log('Код: ' + event.code + ' Причина: ' + event.reason);
};


webSocket.onmessage = function (event) {
  
  var result = JSON.parse(event.data);
  var token = $("input[name='_token']").val();
  var expertise_id = document.getElementById("expertise_id").value;
 

if(result.responseObject) {
    var dataecp = result.responseObject;

    console.log(dataecp);


    $.ajax({
        url: "<?php echo e(route('expertise.approve.accept_si_confirmer_first')); ?>",
        method: 'POST',
        dataType: "json",
        data: {
            _token: token,
            expertise_id: expertise_id,
            _verify: dataecp

        },
        success: function(data) {
            successBox.innerHTML = data.options;
            successBox.style.display = "block";
            errorBox.style.display = "none";
            sign_siCon_ecp_button.style.display="none";
            accept_si_confirmer_first.style.display = "block";
        }
    });
  }


};


function getKeyInfo(storageName, callBack) {
    var getKeyInfo = {
    "module": "kz.gov.pki.knca.commonUtils",
        "method": "getKeyInfo",
        "args": [storageName]
    };
    callback = callBack;
    webSocket.send(JSON.stringify(getKeyInfo));
    console.log('Хранилище определено как ' + storageName);
}

}



function acceptSIConfirmerSecond() {

var errorBox = document.getElementById("error_sign_box");
var successBox = document.getElementById("success_sign_box");

errorBox.style.display = "none";
successBox.style.display = "none";

console.log("Нажата кнопка подписания...");

var webSocket = new WebSocket('wss://127.0.0.1:13579/');
var callback = null;


webSocket.onopen = function (event) {
  console.log("Соединение открыто...");
  getKeyInfo("PKCS12", this);
};



webSocket.onclose = function (event) {
  if (event.wasClean) {
    console.log('Соединение было закрыто');
  } else {
    console.log('Ошибка соединения');
    errorBox.innerHTML = '<p>Обнаружена ошибка подключения к NCALayer на вашем устройстве. Возможно, NCALayer у вас не запущен, либо блокируется сторонними программами. Пожалуйста, убедитесь, что приложение NCALayer работает и повторите попытку заново.</p>';
    errorBox.style.display = "block";
    successBox.style.display = "none";
  }
  console.log('Код: ' + event.code + ' Причина: ' + event.reason);
};


webSocket.onmessage = function (event) {
  
  var result = JSON.parse(event.data);
  var token = $("input[name='_token']").val();
  var expertise_id = document.getElementById("expertise_id").value;
 

if(result.responseObject) {
    var dataecp = result.responseObject;

    console.log(dataecp);


    $.ajax({
        url: "<?php echo e(route('expertise.approve.accept_si_confirmer_second')); ?>",
        method: 'POST',
        dataType: "json",
        data: {
            _token: token,
            expertise_id: expertise_id,
            _verify: dataecp

        },
        success: function(data) {
            successBox.innerHTML = data.options;
            successBox.style.display = "block";
            errorBox.style.display = "none";
            sign_siCon_ecp_button.style.display="none";
            accept_si_confirmer_second.style.display = "block";
        }
    });
  }


};


function getKeyInfo(storageName, callBack) {
    var getKeyInfo = {
    "module": "kz.gov.pki.knca.commonUtils",
        "method": "getKeyInfo",
        "args": [storageName]
    };
    callback = callBack;
    webSocket.send(JSON.stringify(getKeyInfo));
    console.log('Хранилище определено как ' + storageName);
}

}




function acceptGTSReviewer() {

var errorBox = document.getElementById("error_sign_box");
var successBox = document.getElementById("success_sign_box");

errorBox.style.display = "none";
successBox.style.display = "none";

console.log("Нажата кнопка подписания...");

var webSocket = new WebSocket('wss://127.0.0.1:13579/');
var callback = null;


webSocket.onopen = function (event) {
  console.log("Соединение открыто...");
  getKeyInfo("PKCS12", this);
};



webSocket.onclose = function (event) {
  if (event.wasClean) {
    console.log('Соединение было закрыто');
  } else {
    console.log('Ошибка соединения');
    errorBox.innerHTML = '<p>Обнаружена ошибка подключения к NCALayer на вашем устройстве. Возможно, NCALayer у вас не запущен, либо блокируется сторонними программами. Пожалуйста, убедитесь, что приложение NCALayer работает и повторите попытку заново.</p>';
    errorBox.style.display = "block";
    successBox.style.display = "none";
  }
  console.log('Код: ' + event.code + ' Причина: ' + event.reason);
};


webSocket.onmessage = function (event) {
  
  var result = JSON.parse(event.data);
  var token = $("input[name='_token']").val();
  var expertise_id = document.getElementById("expertise_id").value;
  var addAppBtn = document.getElementById('add-app-btn');
  var addSignerBtn = document.getElementById('add-signer-btn');
  var acceptGtsReviewer = document.getElementById('accept_gts_reviewer');
  var gtsReviewer = document.getElementById('gts_reviewer');
 

if(result.responseObject) {
    var dataecp = result.responseObject;

    console.log(dataecp);


    $.ajax({
        url: "<?php echo e(route('expertise.approve.accept_gts_reviewer')); ?>",
        method: 'POST',
        dataType: "json",
        data: {
            _token: token,
            expertise_id: expertise_id,
            _verify: dataecp

        },
        success: function(data) {
            successBox.innerHTML = data.options;
            successBox.style.display = "block";
            errorBox.style.display = "none";
            addAppBtn.style.display = "block";
            addSignerBtn.style.display = "block";
            acceptGtsReviewer.style.display = "block";
            gtsReviewer.style.display = "none";
        }
    });
  }


};


function getKeyInfo(storageName, callBack) {
    var getKeyInfo = {
    "module": "kz.gov.pki.knca.commonUtils",
        "method": "getKeyInfo",
        "args": [storageName]
    };
    callback = callBack;
    webSocket.send(JSON.stringify(getKeyInfo));
    console.log('Хранилище определено как ' + storageName);
}

}


function acceptUOReviewer() {

var errorBox = document.getElementById("error_sign_box");
var successBox = document.getElementById("success_sign_box");

errorBox.style.display = "none";
successBox.style.display = "none";

console.log("Нажата кнопка подписания...");

var webSocket = new WebSocket('wss://127.0.0.1:13579/');
var callback = null;


webSocket.onopen = function (event) {
  console.log("Соединение открыто...");
  getKeyInfo("PKCS12", this);
};



webSocket.onclose = function (event) {
  if (event.wasClean) {
    console.log('Соединение было закрыто');
  } else {
    console.log('Ошибка соединения');
    errorBox.innerHTML = '<p>Обнаружена ошибка подключения к NCALayer на вашем устройстве. Возможно, NCALayer у вас не запущен, либо блокируется сторонними программами. Пожалуйста, убедитесь, что приложение NCALayer работает и повторите попытку заново.</p>';
    errorBox.style.display = "block";
    successBox.style.display = "none";
  }
  console.log('Код: ' + event.code + ' Причина: ' + event.reason);
};


webSocket.onmessage = function (event) {
  
  var result = JSON.parse(event.data);
  var token = $("input[name='_token']").val();
  var expertise_id = document.getElementById("expertise_id").value;
 

if(result.responseObject) {
    var dataecp = result.responseObject;

    console.log(dataecp);


    $.ajax({
        url: "<?php echo e(route('expertise.approve.accept_uo_reviewer_concl')); ?>",
        method: 'POST',
        dataType: "json",
        data: {
            _token: token,
            expertise_id: expertise_id,
            _verify: dataecp

        },
        success: function(data) {
            successBox.innerHTML = data.options;
            successBox.style.display = "block";
            errorBox.style.display = "none";
            sign_siCon_ecp_button.style.display="none";
            accept_si_confirmer_second.style.display = "block";
        }
    });
  }


};


function getKeyInfo(storageName, callBack) {
    var getKeyInfo = {
    "module": "kz.gov.pki.knca.commonUtils",
        "method": "getKeyInfo",
        "args": [storageName]
    };
    callback = callBack;
    webSocket.send(JSON.stringify(getKeyInfo));
    console.log('Хранилище определено как ' + storageName);
}

}



function acceptGtsConfirmer() {

var errorBox = document.getElementById("error_sign_box");
var successBox = document.getElementById("success_sign_box");
var gtsConfirmer = document.getElementById('accept_gts_confirmer');


errorBox.style.display = "none";
successBox.style.display = "none";

console.log("Нажата кнопка подписания...");

var webSocket = new WebSocket('wss://127.0.0.1:13579/');
var callback = null;


webSocket.onopen = function (event) {
  console.log("Соединение открыто...");
  getKeyInfo("PKCS12", this);
};



webSocket.onclose = function (event) {
  if (event.wasClean) {
    console.log('Соединение было закрыто');
  } else {
    console.log('Ошибка соединения');
    errorBox.innerHTML = '<p>Обнаружена ошибка подключения к NCALayer на вашем устройстве. Возможно, NCALayer у вас не запущен, либо блокируется сторонними программами. Пожалуйста, убедитесь, что приложение NCALayer работает и повторите попытку заново.</p>';
    errorBox.style.display = "block";
    successBox.style.display = "none";
  }
  console.log('Код: ' + event.code + ' Причина: ' + event.reason);
};


webSocket.onmessage = function (event) {
  
  var result = JSON.parse(event.data);
  var token = $("input[name='_token']").val();
  var expertise_id = document.getElementById("expertise_id").value;
 

if(result.responseObject) {
    var dataecp = result.responseObject;

    console.log(dataecp);


    $.ajax({
        url: "<?php echo e(route('expertise.approve.accept_gts_confirmer')); ?>",
        method: 'POST',
        dataType: "json",
        data: {
            _token: token,
            expertise_id: expertise_id,
            _verify: dataecp

        },
        success: function(data) {
            successBox.innerHTML = data.options;
            successBox.style.display = "block";
            errorBox.style.display = "none";
            gtsConfirmer.style.display = "block";
        }
    });
  }


};


function getKeyInfo(storageName, callBack) {
    var getKeyInfo = {
    "module": "kz.gov.pki.knca.commonUtils",
        "method": "getKeyInfo",
        "args": [storageName]
    };
    callback = callBack;
    webSocket.send(JSON.stringify(getKeyInfo));
    console.log('Хранилище определено как ' + storageName);
}

}


// document.addEventListener('DOMContentLoaded', function () {
//     var selectElement = document.querySelector('#conSelect');
//     var conclusionsSi = document.querySelectorAll('.conclusion_si');
//     var conclusionsUo = document.querySelectorAll('.conclusion_uo');
//     var conclusionsGts = document.querySelectorAll('.conclusion_gts');

//     function toggleConclusions(selectedOption) {
//       switch (selectedOption) {
//         case 'СИ':
//           hideAllConclusions();
//           conclusionsSi.forEach(function (element) {
//             element.style.display = 'block';
//           });
//           break;
//         case 'УО':
//           hideAllConclusions();
//           conclusionsUo.forEach(function (element) {
//             element.style.display = 'block';
//           });
//           break;
//         case 'ГТС':
//           hideAllConclusions();
//           conclusionsGts.forEach(function (element) {
//             element.style.display = 'block';
//           });
//           break;
//         default:
//           hideAllConclusions();
//       }
//     }

//     function hideAllConclusions() {
//       conclusionsSi.forEach(function (element) {
//         element.style.display = 'none';
//       });
//       conclusionsUo.forEach(function (element) {
//         element.style.display = 'none';
//       });
//       conclusionsGts.forEach(function (element) {
//         element.style.display = 'none';
//       });
//     }

//     selectElement.addEventListener('change', function () {
//       toggleConclusions(this.value);
//     });

//     // Initially hide all conclusions
//     hideAllConclusions();
//   });

  // document.addEventListener('DOMContentLoaded', function () {
  //   var selectElement = document.querySelector('#conSelect');
  //   var conclusionsSi = document.querySelectorAll('.conclusion_si');
  //   var conclusionsUo = document.querySelectorAll('.conclusion_uo');
  //   var conclusionsGts = document.querySelectorAll('.conclusion_gts');

  //   console.log('selectElement:', selectElement);
  //   console.log('conclusionsSi:', conclusionsSi);
  //   console.log('conclusionsUo:', conclusionsUo);
  //   console.log('conclusionsGts:', conclusionsGts);

  //   if (!selectElement) {
  //     console.error('Element with id conSelect not found');
  //     return;
  //   }

  //   function toggleConclusions(selectedOption) {
  //     hideAllConclusions();
  //     switch (selectedOption) {
  //       case 'СИ':
  //         conclusionsSi.forEach(function (element) {
  //           element.style.display = 'block';
  //         });
  //         break;
  //       case 'УО':
  //         conclusionsUo.forEach(function (element) {
  //           element.style.display = 'block';
  //         });
  //         break;
  //       case 'ГТС':
  //         conclusionsGts.forEach(function (element) {
  //           element.style.display = 'block';
  //         });
  //         break;
  //     }
  //   }

    

  //   function hideAllConclusions() {
  //     conclusionsSi.forEach(function (element) {
  //       element.style.display = 'none';
  //     });
  //     conclusionsUo.forEach(function (element) {
  //       element.style.display = 'none';
  //     });
  //     conclusionsGts.forEach(function (element) {
  //       element.style.display = 'none';
  //     });
  //   }

  //   selectElement.addEventListener('change', function () {
  //     toggleConclusions(this.value);
  //   });

  //   // Initially hide all conclusions
  //   hideAllConclusions();
  // });



  function sendToUoReviewer() {
    var token = $("input[name='_token']").val();
    var errorBox = document.getElementById("error_sign_box");
    var successBox = document.getElementById("success_sign_box");
    errorBox.style.display = "none";
    successBox.style.display = "none";
    var expertise_id = document.getElementById("expertise_id").value;
    var selectedExecutor = document.getElementById("send_to_mcriap_executor").value;

    $.ajax({
        url: "<?php echo e(route('expertise.approve.send_uo_reviewer')); ?>",
        method: 'POST',
        dataType: "json",
        data: {
            _token: token,
            expertise_id: expertise_id,
            send_to_mcriap_executor: selectedExecutor  // Передаем выбранного исполнителя
        },
        success: function(data) {
            successBox.innerHTML = data.options;
            successBox.style.display = "block";
            errorBox.style.display = "none";
        }
    });
}




function acceptSiSigner() {

var errorBox = document.getElementById("error_sign_box");
var successBox = document.getElementById("success_sign_box");

errorBox.style.display = "none";
successBox.style.display = "none";
var sendToUoSi = document.getElementById("send_to_uo_si");
var acceptSigner = document.getElementById("accept_si_signer");

console.log("Нажата кнопка подписания...");

var webSocket = new WebSocket('wss://127.0.0.1:13579/');
var callback = null;


webSocket.onopen = function (event) {
  console.log("Соединение открыто...");
  getKeyInfo("PKCS12", this);
};



webSocket.onclose = function (event) {
  if (event.wasClean) {
    console.log('Соединение было закрыто');
  } else {
    console.log('Ошибка соединения');
    errorBox.innerHTML = '<p>Обнаружена ошибка подключения к NCALayer на вашем устройстве. Возможно, NCALayer у вас не запущен, либо блокируется сторонними программами. Пожалуйста, убедитесь, что приложение NCALayer работает и повторите попытку заново.</p>';
    errorBox.style.display = "block";
    successBox.style.display = "none";
  }
  console.log('Код: ' + event.code + ' Причина: ' + event.reason);
};


webSocket.onmessage = function (event) {
  
  var result = JSON.parse(event.data);
  var token = $("input[name='_token']").val();
  var expertise_id = document.getElementById("expertise_id").value;
 

if(result.responseObject) {
    var dataecp = result.responseObject;

    console.log(dataecp);


    $.ajax({
        url: "<?php echo e(route('expertise.approve.accept_si_signer')); ?>",
        method: 'POST',
        dataType: "json",
        data: {
            _token: token,
            expertise_id: expertise_id,
            _verify: dataecp

        },
        success: function(data) {
            successBox.innerHTML = data.options;
            successBox.style.display = "block";
            errorBox.style.display = "none";
            // sendToUoSi.style.display = "block";
            // acceptSigner.style.display = "none";
             // Скроем кнопку "Подписать Эцп"
             
             if (acceptSigner) {
                acceptSigner.style.display = "none";
             }

            // Показать кнопку "Отправить в УО"
            if (sendToUoSi) {
                sendToUoSi.style.display = "block"; 
            } else {
                // Если кнопка "Отправить в УО" не была рендерена, создать её
                var newButton = document.createElement("button");
                newButton.className = "btn";
                newButton.id = "send_to_uo_si";
                newButton.style.cssText = "font-size: 14px; background: #00317B;";
                newButton.innerHTML = "Отправить в УО";
                document.body.appendChild(newButton); // измените это на правильное место в вашем DOM
            }
        }
    });
  }


};


function getKeyInfo(storageName, callBack) {
    var getKeyInfo = {
    "module": "kz.gov.pki.knca.commonUtils",
        "method": "getKeyInfo",
        "args": [storageName]
    };
    callback = callBack;
    webSocket.send(JSON.stringify(getKeyInfo));
    console.log('Хранилище определено как ' + storageName);
}

}



function acceptGTSSigner() {

var errorBox = document.getElementById("error_sign_box");
var successBox = document.getElementById("success_sign_box");

errorBox.style.display = "none";
successBox.style.display = "none";

console.log("Нажата кнопка подписания...");

var webSocket = new WebSocket('wss://127.0.0.1:13579/');
var callback = null;


webSocket.onopen = function (event) {
  console.log("Соединение открыто...");
  getKeyInfo("PKCS12", this);
};



webSocket.onclose = function (event) {
  if (event.wasClean) {
    console.log('Соединение было закрыто');
  } else {
    console.log('Ошибка соединения');
    errorBox.innerHTML = '<p>Обнаружена ошибка подключения к NCALayer на вашем устройстве. Возможно, NCALayer у вас не запущен, либо блокируется сторонними программами. Пожалуйста, убедитесь, что приложение NCALayer работает и повторите попытку заново.</p>';
    errorBox.style.display = "block";
    successBox.style.display = "none";
  }
  console.log('Код: ' + event.code + ' Причина: ' + event.reason);
};


webSocket.onmessage = function (event) {
  
  var result = JSON.parse(event.data);
  var token = $("input[name='_token']").val();
  var expertise_id = document.getElementById("expertise_id").value;
 

if(result.responseObject) {
    var dataecp = result.responseObject;

    console.log(dataecp);


    $.ajax({
        url: "<?php echo e(route('expertise.approve.accept_gts_signer')); ?>",
        method: 'POST',
        dataType: "json",
        data: {
            _token: token,
            expertise_id: expertise_id,
            _verify: dataecp

        },
        success: function(data) {
            successBox.innerHTML = data.options;
            successBox.style.display = "block";
            errorBox.style.display = "none";
            sign_siCon_ecp_button.style.display="none";
            accept_si_confirmer_second.style.display = "block";
        }
    });
  }


};


function getKeyInfo(storageName, callBack) {
    var getKeyInfo = {
    "module": "kz.gov.pki.knca.commonUtils",
        "method": "getKeyInfo",
        "args": [storageName]
    };
    callback = callBack;
    webSocket.send(JSON.stringify(getKeyInfo));
    console.log('Хранилище определено как ' + storageName);
}

}


function acceptUOConfirmer() {

var errorBox = document.getElementById("error_sign_box");
var successBox = document.getElementById("success_sign_box");

errorBox.style.display = "none";
successBox.style.display = "none";

console.log("Нажата кнопка подписания...");

var webSocket = new WebSocket('wss://127.0.0.1:13579/');
var callback = null;


webSocket.onopen = function (event) {
  console.log("Соединение открыто...");
  getKeyInfo("PKCS12", this);
};



webSocket.onclose = function (event) {
  if (event.wasClean) {
    console.log('Соединение было закрыто');
  } else {
    console.log('Ошибка соединения');
    errorBox.innerHTML = '<p>Обнаружена ошибка подключения к NCALayer на вашем устройстве. Возможно, NCALayer у вас не запущен, либо блокируется сторонними программами. Пожалуйста, убедитесь, что приложение NCALayer работает и повторите попытку заново.</p>';
    errorBox.style.display = "block";
    successBox.style.display = "none";
  }
  console.log('Код: ' + event.code + ' Причина: ' + event.reason);
};


webSocket.onmessage = function (event) {
  
  var result = JSON.parse(event.data);
  var token = $("input[name='_token']").val();
  var expertise_id = document.getElementById("expertise_id").value;
 

if(result.responseObject) {
    var dataecp = result.responseObject;

    console.log(dataecp);


    $.ajax({
        url: "<?php echo e(route('expertise.approve.accept_gts_signer')); ?>",
        method: 'POST',
        dataType: "json",
        data: {
            _token: token,
            expertise_id: expertise_id,
            _verify: dataecp

        },
        success: function(data) {
            successBox.innerHTML = data.options;
            successBox.style.display = "block";
            errorBox.style.display = "none";
            sign_siCon_ecp_button.style.display="none";
            accept_si_confirmer_second.style.display = "block";
        }
    });
  }


};


function getKeyInfo(storageName, callBack) {
    var getKeyInfo = {
    "module": "kz.gov.pki.knca.commonUtils",
        "method": "getKeyInfo",
        "args": [storageName]
    };
    callback = callBack;
    webSocket.send(JSON.stringify(getKeyInfo));
    console.log('Хранилище определено как ' + storageName);
}

}



function acceptUOSigner() {

var errorBox = document.getElementById("error_sign_box");
var successBox = document.getElementById("success_sign_box");

errorBox.style.display = "none";
successBox.style.display = "none";

console.log("Нажата кнопка подписания...");

var webSocket = new WebSocket('wss://127.0.0.1:13579/');
var callback = null;


webSocket.onopen = function (event) {
  console.log("Соединение открыто...");
  getKeyInfo("PKCS12", this);
};



webSocket.onclose = function (event) {
  if (event.wasClean) {
    console.log('Соединение было закрыто');
  } else {
    console.log('Ошибка соединения');
    errorBox.innerHTML = '<p>Обнаружена ошибка подключения к NCALayer на вашем устройстве. Возможно, NCALayer у вас не запущен, либо блокируется сторонними программами. Пожалуйста, убедитесь, что приложение NCALayer работает и повторите попытку заново.</p>';
    errorBox.style.display = "block";
    successBox.style.display = "none";
  }
  console.log('Код: ' + event.code + ' Причина: ' + event.reason);
};


webSocket.onmessage = function (event) {
  
  var result = JSON.parse(event.data);
  var token = $("input[name='_token']").val();
  var expertise_id = document.getElementById("expertise_id").value;
 

if(result.responseObject) {
    var dataecp = result.responseObject;

    console.log(dataecp);


    $.ajax({
        url: "<?php echo e(route('expertise.approve.accept_uo_signer')); ?>",
        method: 'POST',
        dataType: "json",
        data: {
            _token: token,
            expertise_id: expertise_id,
            _verify: dataecp

        },
        success: function(data) {
            successBox.innerHTML = data.options;
            successBox.style.display = "block";
            errorBox.style.display = "none";
            sign_siCon_ecp_button.style.display="none";
            accept_si_confirmer_second.style.display = "block";
        }
    });
  }


};


function getKeyInfo(storageName, callBack) {
    var getKeyInfo = {
    "module": "kz.gov.pki.knca.commonUtils",
        "method": "getKeyInfo",
        "args": [storageName]
    };
    callback = callBack;
    webSocket.send(JSON.stringify(getKeyInfo));
    console.log('Хранилище определено как ' + storageName);
}

}

// document.getElementById('add-approver-btn').addEventListener('click', function() {
//         var container = document.getElementById('approvers-container');
//         var selectCount = container.getElementsByTagName('select').length + 1;

//         var label = document.createElement('label');
//         label.setAttribute('for', 'approver' + selectCount);
//         label.textContent = 'Выбрать исполнителя';

//         var select = document.createElement('select');
//         select.setAttribute('id', 'approver' + selectCount);
//         // select.setAttribute('name', 'approver_id' + selectCount);
//         select.setAttribute('name', 'approver_id[]');
//         select.style.width = '100%';
//         select.style.padding = '8px 12px';
//         select.style.marginBottom = '15px';

//         var defaultOption = document.createElement('option');
//         defaultOption.setAttribute('selected', 'selected');
//         defaultOption.setAttribute('disabled', 'disabled');
//         defaultOption.textContent = 'Выберите исполнителя';
//         select.appendChild(defaultOption);

//         // Добавление пользователей в селект
//         <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
//             <?php if($user->hasRole('ROLE_GTS_EXPERTISE_REVIEWER')): ?>
//                 var option = document.createElement('option');
//                 option.setAttribute('value', '<?php echo e($user->id); ?>');
//                 option.textContent = '<?php echo e($user->name); ?> <?php echo e($user->surname); ?> <?php echo e($user->middlename); ?>';
//                 select.appendChild(option);
//             <?php endif; ?>
//         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

//         container.appendChild(label);
//         container.appendChild(select);
//     });

// //////////////////////////////////////////////////////////////////////////////////////////////

// document.getElementById('add-signer-btn').addEventListener('click', function() {
//     var container = document.getElementById('signer-container');
//     var selectCount = container.getElementsByTagName('select').length + 1;

//     var label = document.createElement('label');
//     label.setAttribute('for', 'signer' + selectCount);
//     label.textContent = 'Выбрать исполнителя';

//     var select = document.createElement('select');
//     select.setAttribute('id', 'signer' + selectCount);
//     // select.setAttribute('name', 'signer_id' + selectCount);
//     select.setAttribute('name', 'signer_id[]');
//     select.style.width = '100%';
//     select.style.padding = '8px 12px';
//     select.style.marginBottom = '15px';

//     var defaultOption = document.createElement('option');
//     defaultOption.setAttribute('selected', 'selected');
//     defaultOption.setAttribute('disabled', 'disabled');
//     defaultOption.textContent = 'Выберите исполнителя';
//     select.appendChild(defaultOption);

//     // Добавление пользователей в селект
//     <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
//         <?php if($user->hasRole('ROLE_GTS_EXPERTISE_REVIEWER')): ?>
//             var option = document.createElement('option');
//             option.setAttribute('value', '<?php echo e($user->id); ?>');
//             option.textContent = '<?php echo e($user->name); ?> <?php echo e($user->surname); ?> <?php echo e($user->middlename); ?>';
//             select.appendChild(option);
//         <?php endif; ?>
//     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

//     container.appendChild(label);
//     container.appendChild(select);
// });

    // ////////////////////////////////////////////////////////////////////////////////////////////////////////
    document.addEventListener('DOMContentLoaded', function() {
    document.addEventListener('click', function(event) {
        // Проверяем, была ли нажата кнопка 'Добавить исполнителя'
        if (event.target && event.target.id === 'add-approver-btn') {
            var container = document.getElementById('approvers-container');
            var selectCount = container.getElementsByTagName('select').length + 1;

            var label = document.createElement('label');
            label.setAttribute('for', 'approver' + selectCount);
            label.textContent = 'Выбрать исполнителя';

            var select = document.createElement('select');
            select.setAttribute('id', 'approver' + selectCount);
            select.setAttribute('name', 'approver_id[]');
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
        }
        else if (event.target && event.target.id === 'add-signer-btn') {
            var container = document.getElementById('signer-container');
            var selectCount = container.getElementsByTagName('select').length + 1;

            var label = document.createElement('label');
            label.setAttribute('for', 'signer' + selectCount);
            label.textContent = 'Выбрать подписывающего';

            var select = document.createElement('select');
            select.setAttribute('id', 'signer' + selectCount);
            select.setAttribute('name', 'signer[]');
            select.style.width = '100%';
            select.style.padding = '8px 12px';
            select.style.marginBottom = '15px';

            var defaultOption = document.createElement('option');
            defaultOption.setAttribute('selected', 'selected');
            defaultOption.setAttribute('disabled', 'disabled');
            defaultOption.textContent = 'Выберите подписывающего';
            select.appendChild(defaultOption);

            // Добавление пользователей в селект
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($user->hasRole('ROLE_GTS_EXPERTISE_SIGNER')): ?>
                    var option = document.createElement('option');
                    option.setAttribute('value', '<?php echo e($user->id); ?>');
                    option.textContent = '<?php echo e($user->name); ?> <?php echo e($user->surname); ?> <?php echo e($user->middlename); ?>';
                    select.appendChild(option);
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            container.appendChild(label);
            container.appendChild(select);
        }
        else if (event.target && event.target.id === 'add-app-btn') {
            var container = document.getElementById('app-container');
            var selectCount = container.getElementsByTagName('select').length + 1;

            var label = document.createElement('label');
            label.setAttribute('for', 'app' + selectCount);
            label.textContent = 'Выбрать согласующего';

            var select = document.createElement('select');
            select.setAttribute('id', 'app' + selectCount);
            select.setAttribute('name', 'app_id[]');
            select.style.width = '100%';
            select.style.padding = '8px 12px';
            select.style.marginBottom = '15px';

            var defaultOption = document.createElement('option');
            defaultOption.setAttribute('selected', 'selected');
            defaultOption.setAttribute('disabled', 'disabled');
            defaultOption.textContent = 'Выберите согласующего';
            select.appendChild(defaultOption);

            // Добавление пользователей в селект
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($user->hasRole('ROLE_GTS_EXPERTISE_CONFIRMER')): ?>
                    var option = document.createElement('option');
                    option.setAttribute('value', '<?php echo e($user->id); ?>');
                    option.textContent = '<?php echo e($user->name); ?> <?php echo e($user->surname); ?> <?php echo e($user->middlename); ?>';
                    select.appendChild(option);
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            container.appendChild(label);
            container.appendChild(select);
        }
        else if (event.target && event.target.id === 'add-signerUo-btn') {
            var container = document.getElementById('signerUo-container');
            var selectCount = container.getElementsByTagName('select').length + 1;

            var label = document.createElement('label');
            label.setAttribute('for', 'signerUo' + selectCount);
            label.textContent = 'Выбрать подписывающего';

            var select = document.createElement('select');
            select.setAttribute('id', 'signerUo' + selectCount);
            select.setAttribute('name', 'signerUo[]');
            select.style.width = '100%';
            select.style.padding = '8px 12px';
            select.style.marginBottom = '15px';

            var defaultOption = document.createElement('option');
            defaultOption.setAttribute('selected', 'selected');
            defaultOption.setAttribute('disabled', 'disabled');
            defaultOption.textContent = 'Выберите подписывающего';
            select.appendChild(defaultOption);

            // Добавление пользователей в селект
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($user->hasRole('ROLE_UO_EXPERTISE_SIGNER')): ?>
                    var option = document.createElement('option');
                    option.setAttribute('value', '<?php echo e($user->id); ?>');
                    option.textContent = '<?php echo e($user->name); ?> <?php echo e($user->surname); ?> <?php echo e($user->middlename); ?>';
                    select.appendChild(option);
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            container.appendChild(label);
            container.appendChild(select);
        }
        else if (event.target && event.target.id === 'add-appUo-btn') {
            var container = document.getElementById('appUo-container');
            var selectCount = container.getElementsByTagName('select').length + 1;

            var label = document.createElement('label');
            label.setAttribute('for', 'appUo' + selectCount);
            label.textContent = 'Выбрать согласующего';

            var select = document.createElement('select');
            select.setAttribute('id', 'appUo' + selectCount);
            select.setAttribute('name', 'appUo[]');
            select.style.width = '100%';
            select.style.padding = '8px 12px';
            select.style.marginBottom = '15px';

            var defaultOption = document.createElement('option');
            defaultOption.setAttribute('selected', 'selected');
            defaultOption.setAttribute('disabled', 'disabled');
            defaultOption.textContent = 'Выберите согласующего';
            select.appendChild(defaultOption);

            // Добавление пользователей в селект
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($user->hasRole('ROLE_UO_EXPERTISE_CONFIRMER')): ?>
                    var option = document.createElement('option');
                    option.setAttribute('value', '<?php echo e($user->id); ?>');
                    option.textContent = '<?php echo e($user->name); ?> <?php echo e($user->surname); ?> <?php echo e($user->middlename); ?>';
                    select.appendChild(option);
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            container.appendChild(label);
            container.appendChild(select);
        }
    });
});


    
// document.getElementById('exportButton').addEventListener('click', function() {
//       const selectedOption = document.getElementById('conSelect').value;
//       console.log('Selected option:', selectedOption);
//       window.location.href = `/export-expertise/${selectedOption}`;
//   });
  
document.getElementById('exportButton').addEventListener('click', function() {
    const selectedOption = document.getElementById('conSelect').value;
    console.log('Selected option:', selectedOption);
    window.location.href = `/export-expertise/${selectedOption}`;
});




function toggleEdit() {
  const editButton = document.getElementById('editButton');
  const editables = document.querySelectorAll('.editable');
  const selects = document.querySelectorAll('select');

  editables.forEach(el => {
    if (el.readOnly) {
      el.readOnly = false;
      el.style.backgroundColor = "#fff"; // Optional: Change background color to indicate editable state
    } else {
      el.readOnly = true;
      el.style.backgroundColor = "#f9f9f9"; // Revert background color
    }
  });

  selects.forEach(el => {
    if (el.disabled) {
      el.disabled = false;
      el.style.backgroundColor = "#fff"; // Optional: Change background color to indicate editable state
    } else {
      el.disabled = true;
      el.style.backgroundColor = "#f9f9f9"; // Revert background color
    }
  });

  if (editButton.textContent === 'Редактировать') {
    // editButton.textContent = 'Сохранить';
    editButton.style.display = 'none';
    document.getElementById('save_si_reviewer').style.display = 'block'; // Показать кнопку сохранения
  } else {
    editButton.textContent = 'Редактировать';
    document.getElementById('save_si_reviewer').click(); // Trigger form submission
  }
}

document.getElementById('editButton').addEventListener('click', toggleEdit);

///////////////////////////////////////////////////////////////////////////////////////

document.addEventListener('DOMContentLoaded', function () {
    const editButton = document.getElementById('editButton');
    const conSelect = document.getElementById('conSelect');
    const userRoles = <?php echo json_encode(auth()->user()->roles, 15, 512) ?>;

    // console.log('User roles:', userRoles);
    // console.log('asd', conSelect);  // For debugging

    function userHasRole(roleName) {
        return userRoles.some(role => role.name === roleName);
    }

    function updateEditButtonState() {
        const selectedValue = conSelect.value;
        let canEdit = false;

        // console.log('Selected value:', selectedValue);  // For debugging

        if (selectedValue === 'СИ' && userHasRole('ROLE_SI_EXPERTISE_REVIEWER')) {
            canEdit = true;
        } else if (selectedValue === 'ГТС' && userHasRole('ROLE_GTS_EXPERTISE_REVIEWER')) {
            canEdit = true;
        } else if (selectedValue === 'УО' && userHasRole('ROLE_UO_EXPERTISE_REVIEWER')) {
            canEdit = true;
        }

        // console.log('Can edit:', canEdit);  // For debugging

        if (canEdit) {
            editButton.style.display = 'inline-block';
        } else {
            editButton.style.display = 'none';
        }
    }

    // Initial check
    updateEditButtonState();

    // Check on change
    conSelect.addEventListener('change', updateEditButtonState);
});


</script>


<?php $__env->stopSection(); ?><?php /**PATH C:\Users\user\Documents\НОВЫЙ ПОРТАЛ\www\resources\views/expertise/info/comments_scripts.blade.php ENDPATH**/ ?>