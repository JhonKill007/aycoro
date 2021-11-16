// var URLactual = window.location;


document.querySelector('.hidde_editor').addEventListener('click', () => {
  document.querySelector(".contein-editor").classList.toggle("show")
})

let checkOption = 0;
document.querySelector('.postcheck').addEventListener('click', () => {
  checkOption = 1;
})


document.querySelector('.historycheck').addEventListener('click', () => {
  checkOption = 2;
})



if (perfil == 1) {
  document.querySelector('.postcheck1').addEventListener('click', () => {
    checkOption = 1;
  })

  document.querySelector('.historycheck1').addEventListener('click', () => {
    checkOption = 2;
  })
}



if (perfil == 2) {
  document.querySelector('.perfilcheck').addEventListener('click', () => {
    checkOption = 4;
  })
  
  
  document.querySelector('.portadacheck').addEventListener('click', () => {
    checkOption = 5;
    console.log(checkOption)
  })
}







window.onload = function () {
  'use strict';

  var Cropper = window.Cropper;
  var URL = window.URL || window.webkitURL;
  var container = document.querySelector('.img-container');
  var image = container.getElementsByTagName('img').item(0);
  var download = document.getElementById('download');
  var actions = document.getElementById('actions');
  var dataX = document.getElementById('dataX');
  var dataY = document.getElementById('dataY');
  var dataHeight = document.getElementById('dataHeight');
  var dataWidth = document.getElementById('dataWidth');
  var dataRotate = document.getElementById('dataRotate');
  var dataScaleX = document.getElementById('dataScaleX');
  var dataScaleY = document.getElementById('dataScaleY');

  // options
  var options = {
    aspectRatio: 1 / 1,
    preview: '.img-preview',
    ready: function (e) {
      console.log(e.type);
    },
    cropstart: function (e) {
      console.log(e.type, e.detail.action);
    },
    cropmove: function (e) {
      console.log(e.type, e.detail.action);
    },
    cropend: function (e) {
      console.log(e.type, e.detail.action);
    },
    crop: function (e) {
      var data = e.detail;

      console.log(e.type);
      dataX.value = Math.round(data.x);
      dataY.value = Math.round(data.y);
      dataHeight.value = Math.round(data.height);
      dataWidth.value = Math.round(data.width);
      dataRotate.value = typeof data.rotate !== 'undefined' ? data.rotate : '';
      dataScaleX.value = typeof data.scaleX !== 'undefined' ? data.scaleX : '';
      dataScaleY.value = typeof data.scaleY !== 'undefined' ? data.scaleY : '';
    },
    zoom: function (e) {
      console.log(e.type, e.detail.ratio);
    }
  };

  var optionshistory = {
    aspectRatio: 3 / 5,
    preview: '.img-preview',
    ready: function (e) {
      console.log(e.type);
    },
    cropstart: function (e) {
      console.log(e.type, e.detail.action);
    },
    cropmove: function (e) {
      console.log(e.type, e.detail.action);
    },
    cropend: function (e) {
      console.log(e.type, e.detail.action);
    },
    crop: function (e) {
      var data = e.detail;

      console.log(e.type);
      dataX.value = Math.round(data.x);
      dataY.value = Math.round(data.y);
      dataHeight.value = Math.round(data.height);
      dataWidth.value = Math.round(data.width);
      dataRotate.value = typeof data.rotate !== 'undefined' ? data.rotate : '';
      dataScaleX.value = typeof data.scaleX !== 'undefined' ? data.scaleX : '';
      dataScaleY.value = typeof data.scaleY !== 'undefined' ? data.scaleY : '';
    },
    zoom: function (e) {
      console.log(e.type, e.detail.ratio);
    }
  };

  var optionsportada = {
    aspectRatio: 19 / 6,
    preview: '.img-preview',
    ready: function (e) {
      console.log(e.type);
    },
    cropstart: function (e) {
      console.log(e.type, e.detail.action);
    },
    cropmove: function (e) {
      console.log(e.type, e.detail.action);
    },
    cropend: function (e) {
      console.log(e.type, e.detail.action);
    },
    crop: function (e) {
      var data = e.detail;

      console.log(e.type);
      dataX.value = Math.round(data.x);
      dataY.value = Math.round(data.y);
      dataHeight.value = Math.round(data.height);
      dataWidth.value = Math.round(data.width);
      dataRotate.value = typeof data.rotate !== 'undefined' ? data.rotate : '';
      dataScaleX.value = typeof data.scaleX !== 'undefined' ? data.scaleX : '';
      dataScaleY.value = typeof data.scaleY !== 'undefined' ? data.scaleY : '';
    },
    zoom: function (e) {
      console.log(e.type, e.detail.ratio);
    }
  };



  var cropper = new Cropper(image, options);
  var originalImageURL = image.src;
  var uploadedImageType = 'image/jpeg';
  var uploadedImageName = '154jhonjhon.jpg';
  var uploadedImageURL;

  // Tooltip
  $('[data-toggle="tooltip"]').tooltip();

  // Buttons
  if (!document.createElement('canvas').getContext) {
    $('button[data-method="getCroppedCanvas"]').prop('disabled', true);
  }

  if (typeof document.createElement('cropper').style.transition === 'undefined') {
    $('button[data-method="rotate"]').prop('disabled', true);
    $('button[data-method="scale"]').prop('disabled', true);
  }

  // Download
  if (typeof download.download === 'undefined') {
    download.className += ' disabled';
    download.title = 'Your browser does not support download';
  }

  // Options
  actions.querySelector('.docs-toggles').onchange = function (event) {
    var e = event || window.event;
    var target = e.target || e.srcElement;
    var cropBoxData;
    var canvasData;
    var isCheckbox;
    var isRadio;

    if (!cropper) {
      return;
    }

    if (target.tagName.toLowerCase() === 'label') {
      target = target.querySelector('input');
    }

    isCheckbox = target.type === 'checkbox';
    isRadio = target.type === 'radio';

    if (isCheckbox || isRadio) {
      if (isCheckbox) {
        options[target.name] = target.checked;
        cropBoxData = cropper.getCropBoxData();
        canvasData = cropper.getCanvasData();

        options.ready = function () {
          console.log('ready');
          cropper.setCropBoxData(cropBoxData).setCanvasData(canvasData);
        };
      } else {
        options[target.name] = target.value;
        options.ready = function () {
          console.log('ready');
        };
      }

      // Restart
      cropper.destroy();
      cropper = new Cropper(image, options);
    }
  };

  // Methods
  actions.querySelector('.docs-buttons').onclick = function (event) {
    var e = event || window.event;
    var target = e.target || e.srcElement;
    var cropped;
    var result;
    var input;
    var data;

    if (!cropper) {
      return;
    }

    while (target !== this) {
      if (target.getAttribute('data-method')) {
        break;
      }

      target = target.parentNode;
    }

    if (target === this || target.disabled || target.className.indexOf('disabled') > -1) {
      return;
    }

    data = {
      method: target.getAttribute('data-method'),
      target: target.getAttribute('data-target'),
      option: target.getAttribute('data-option') || undefined,
      secondOption: target.getAttribute('data-second-option') || undefined
    };

    cropped = cropper.cropped;

    if (data.method) {
      if (typeof data.target !== 'undefined') {
        input = document.querySelector(data.target);

        if (!target.hasAttribute('data-option') && data.target && input) {
          try {
            data.option = JSON.parse(input.value);
          } catch (e) {
            console.log(e.message);
          }
        }
      }

      switch (data.method) {
        case 'rotate':
          if (cropped && options.viewMode > 0) {
            cropper.clear();
          }

          break;

        case 'getCroppedCanvas':
          try {
            data.option = JSON.parse(data.option);
          } catch (e) {
            console.log(e.message);
          }

          if (uploadedImageType === 'image/jpeg') {
            if (!data.option) {
              data.option = {};
            }

            data.option.fillColor = '#fff';
          }

          break;
      }

      result = cropper[data.method](data.option, data.secondOption);

      switch (data.method) {
        case 'rotate':
          if (cropped && options.viewMode > 0) {
            cropper.crop();
          }

          break;

        case 'scaleX':
        case 'scaleY':
          target.setAttribute('data-option', -data.option);
          break;

        case 'getCroppedCanvas':
          if (result) {

            // enviar data_img to form
            // $('#getCroppedCanvasModal').modal().find('.modal-body').html(result);
            document.getElementById("base65").value = result.toDataURL(uploadedImageType);

          }

          break;

        case 'destroy':

          if (checkOption == 1 || checkOption == 2) {
            document.querySelector(".box-up-one").classList.toggle("hidde")
            if (checkOption == 1) {
              document.querySelector(".textos_stados").classList.toggle("show")
            }
          }

          break;
      }

      if (typeof result === 'object' && result !== cropper && input) {
        try {
          input.value = JSON.stringify(result);
        } catch (e) {
          console.log(e.message);
        }
      }
    }
  };

  document.body.onkeydown = function (event) {
    var e = event || window.event;

    if (e.target !== this || !cropper || this.scrollTop > 300) {
      return;
    }

    switch (e.keyCode) {
      case 37:
        e.preventDefault();
        cropper.move(-1, 0);
        break;

      case 38:
        e.preventDefault();
        cropper.move(0, -1);
        break;

      case 39:
        e.preventDefault();
        cropper.move(1, 0);
        break;

      case 40:
        e.preventDefault();
        cropper.move(0, 1);
        break;
    }
  };

  // Import image
  var inputImage = document.getElementById('inputImage');

  if (URL) {
    inputImage.onchange = function () {
      document.querySelector(".contein-editor").classList.toggle("show")
      document.querySelector(".textos_stados").classList.toggle("show")
      console.log(checkOption);
      var files = this.files;
      var file;


      if (files && files.length) {
        file = files[0];
        let extencion = file.name;
        document.getElementById("extencion").value = extencion;
        document.getElementById("optionpost").value = checkOption;

        if (/^image\/\w+/.test(file.type)) {
          uploadedImageType = file.type;
          uploadedImageName = file.name;

          if (uploadedImageURL) {
            URL.revokeObjectURL(uploadedImageURL);
          }

          image.src = uploadedImageURL = URL.createObjectURL(file);


          if (cropper) {
            cropper.destroy();
          }

          cropper = new Cropper(image, options);
          inputImage.value = null;
        } else {
          window.alert('Please choose an image file.');
        }
      }
    };
  } else {
    inputImage.disabled = true;
    inputImage.parentNode.className += ' disabled';
  }

  // history
  var inputImagehistory = document.getElementById('inputImagehistory');

  if (URL) {
    inputImagehistory.onchange = function () {
      document.querySelector(".contein-editor").classList.toggle("show")
      console.log(checkOption);
      var files = this.files;
      var file;


      if (files && files.length) {
        file = files[0];
        let extencion = file.name;
        document.getElementById("extencion").value = extencion;
        document.getElementById("optionpost").value = checkOption;

        if (/^image\/\w+/.test(file.type)) {
          uploadedImageType = file.type;
          uploadedImageName = file.name;

          if (uploadedImageURL) {
            URL.revokeObjectURL(uploadedImageURL);
          }

          image.src = uploadedImageURL = URL.createObjectURL(file);


          if (cropper) {
            cropper.destroy();
          }

          cropper = new Cropper(image, optionshistory);
          inputImagehistory.value = null;
        } else {
          window.alert('Please choose an image file.');
        }
      }
    };
  } else {
    inputImagehistory.disabled = true;
    inputImagehistory.parentNode.className += ' disabled';
  }


  if (perfil == 1) {
    var inputImagehistory1 = document.getElementById('inputImagehistory1');

    if (URL) {
      inputImagehistory1.onchange = function () {
        document.querySelector(".contein-editor").classList.toggle("show")
        document.querySelector(".box-up-one").classList.toggle("hidde")
        console.log(checkOption);
        var files = this.files;
        var file;


        if (files && files.length) {
          file = files[0];
          let extencion = file.name;
          document.getElementById("extencion").value = extencion;
          document.getElementById("optionpost").value = checkOption;

          if (/^image\/\w+/.test(file.type)) {
            uploadedImageType = file.type;
            uploadedImageName = file.name;

            if (uploadedImageURL) {
              URL.revokeObjectURL(uploadedImageURL);
            }

            image.src = uploadedImageURL = URL.createObjectURL(file);


            if (cropper) {
              cropper.destroy();
            }

            cropper = new Cropper(image, optionshistory);
            inputImagehistory1.value = null;
          } else {
            window.alert('Please choose an image file.');
          }
        }
      };
    } else {
      inputImagehistory1.disabled = true;
      inputImagehistory1.parentNode.className += ' disabled';
    }

    var inputImage1 = document.getElementById('inputImage1');

    if (URL) {
      inputImage1.onchange = function () {
        document.querySelector(".contein-editor").classList.toggle("show")
        document.querySelector(".textos_stados").classList.toggle("show")
        document.querySelector(".box-up-one").classList.toggle("hidde")
        console.log(checkOption);
        var files = this.files;
        var file;


        if (files && files.length) {
          file = files[0];
          let extencion = file.name;
          document.getElementById("extencion").value = extencion;
          document.getElementById("optionpost").value = checkOption;

          if (/^image\/\w+/.test(file.type)) {
            uploadedImageType = file.type;
            uploadedImageName = file.name;

            if (uploadedImageURL) {
              URL.revokeObjectURL(uploadedImageURL);
            }

            image.src = uploadedImageURL = URL.createObjectURL(file);


            if (cropper) {
              cropper.destroy();
            }

            cropper = new Cropper(image, options);
            inputImage1.value = null;
          } else {
            window.alert('Please choose an image file.');
          }
        }
      };
    } else {
      inputImage1.disabled = true;
      inputImage1.parentNode.className += ' disabled';
    }
  }
  if (perfil == 2) {

    // perfil
    var inputImageperfil = document.getElementById('inputImageperfil');

    if (URL) {
      inputImageperfil.onchange = function () {
        document.querySelector(".contein-editor").classList.toggle("show")
        console.log(checkOption);
        var files = this.files;
        var file;


        if (files && files.length) {
          file = files[0];
          let extencion = file.name;
          document.getElementById("extencion").value = extencion;
          document.getElementById("optionpost").value = checkOption;

          if (/^image\/\w+/.test(file.type)) {
            uploadedImageType = file.type;
            uploadedImageName = file.name;

            if (uploadedImageURL) {
              URL.revokeObjectURL(uploadedImageURL);
            }

            image.src = uploadedImageURL = URL.createObjectURL(file);


            if (cropper) {
              cropper.destroy();
            }

            cropper = new Cropper(image, options);
            inputImageperfil.value = null;
          } else {
            window.alert('Please choose an image file.');
          }
        }
      };
    } else {
      inputImageperfil.disabled = true;
      inputImageperfil.parentNode.className += ' disabled';
    }


    // portada
    var inputImageportada = document.getElementById('inputImageportada');

    if (URL) {
      inputImageportada.onchange = function () {
        document.querySelector(".contein-editor").classList.toggle("show")
        console.log(checkOption);
        var files = this.files;
        var file;


        if (files && files.length) {
          file = files[0];
          let extencion = file.name;
          document.getElementById("extencion").value = extencion;
          document.getElementById("optionpost").value = checkOption;

          if (/^image\/\w+/.test(file.type)) {
            uploadedImageType = file.type;
            uploadedImageName = file.name;

            if (uploadedImageURL) {
              URL.revokeObjectURL(uploadedImageURL);
            }

            image.src = uploadedImageURL = URL.createObjectURL(file);


            if (cropper) {
              cropper.destroy();
            }

            cropper = new Cropper(image, optionsportada);
            inputImageportada.value = null;
          } else {
            window.alert('Please choose an image file.');
          }
        }
      };
    } else {
      inputImageportada.disabled = true;
      inputImageportada.parentNode.className += ' disabled';
    }
  }
};


