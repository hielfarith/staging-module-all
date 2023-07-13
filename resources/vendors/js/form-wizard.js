/*=========================================================================================
    File Name: form-wizard.js
    Description: wizard steps page specific js
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(function () {
  'use strict';

  var bsStepper = document.querySelectorAll('.bs-stepper'),
    select = $('.select2'),
    horizontalWizard = document.querySelector('.horizontal-wizard-example'),
    verticalWizard = document.querySelector('.vertical-wizard-example'),
    verticalWizard1 = document.querySelector('.vertical-wizard-1-example'),
    verticalWizard2 = document.querySelector('.vertical-wizard-2-example'),
    verticalWizard3 = document.querySelector('.vertical-wizard-3-example'),
    verticalWizard4 = document.querySelector('.vertical-wizard-4-example'),
    verticalWizard5 = document.querySelector('.vertical-wizard-5-example'),
    verticalWizard6 = document.querySelector('.vertical-wizard-6-example'),
    verticalWizard7 = document.querySelector('.vertical-wizard-7-example'),
    verticalWizard8 = document.querySelector('.vertical-wizard-8-example'),
    verticalWizard9 = document.querySelector('.vertical-wizard-9-example'),
    verticalWizard10 = document.querySelector('.vertical-wizard-10-example'),
    verticalWizard11 = document.querySelector('.vertical-wizard-11-example'),
    verticalWizard12 = document.querySelector('.vertical-wizard-12-example'),
    verticalWizard13 = document.querySelector('.vertical-wizard-13-example'),
    modernWizard = document.querySelector('.modern-wizard-example'),
    modernVerticalWizard = document.querySelector('.modern-vertical-wizard-example');

  // Adds crossed class
  if (typeof bsStepper !== undefined && bsStepper !== null) {
    for (var el = 0; el < bsStepper.length; ++el) {
      bsStepper[el].addEventListener('show.bs-stepper', function (event) {
        var index = event.detail.indexStep;
        var numberOfSteps = $(event.target).find('.step').length - 1;
        var line = $(event.target).find('.step');

        // The first for loop is for increasing the steps,
        // the second is for turning them off when going back
        // and the third with the if statement because the last line
        // can't seem to turn off when I press the first item. ¯\_(ツ)_/¯

        for (var i = 0; i < index; i++) {
          line[i].classList.add('crossed');

          for (var j = index; j < numberOfSteps; j++) {
            line[j].classList.remove('crossed');
          }
        }
        if (event.detail.to == 0) {
          for (var k = index; k < numberOfSteps; k++) {
            line[k].classList.remove('crossed');
          }
          line[0].classList.remove('crossed');
        }
      });
    }
  }

  // select2
  select.each(function () {
    var $this = $(this);
    $this.wrap('<div class="position-relative"></div>');
    $this.select2({
      placeholder: 'Select value',
      dropdownParent: $this.parent()
    });
  });

  // Horizontal Wizard
  // --------------------------------------------------------------------
  if (typeof horizontalWizard !== undefined && horizontalWizard !== null) {
    var numberedStepper = new Stepper(horizontalWizard),
      $form = $(horizontalWizard).find('form');
    $form.each(function () {
      var $this = $(this);
      $this.validate({
        rules: {
          username: {
            required: true
          },
          email: {
            required: true
          },
          password: {
            required: true
          },
          'confirm-password': {
            required: true,
            equalTo: '#password'
          },
          'first-name': {
            required: true
          },
          'last-name': {
            required: true
          },
          address: {
            required: true
          },
          landmark: {
            required: true
          },
          country: {
            required: true
          },
          language: {
            required: true
          },
          twitter: {
            required: true,
            url: true
          },
          facebook: {
            required: true,
            url: true
          },
          google: {
            required: true,
            url: true
          },
          linkedin: {
            required: true,
            url: true
          }
        }
      });
    });

    $(horizontalWizard)
      .find('.btn-next')
      .each(function () {
        $(this).on('click', function (e) {
          var isValid = $(this).parent().siblings('form').valid();
          if (isValid) {
            numberedStepper.next();
          } else {
            e.preventDefault();
          }
        });
      });

    $(horizontalWizard)
      .find('.btn-prev')
      .on('click', function () {
        numberedStepper.previous();
      });

    $(horizontalWizard)
      .find('.btn-submit')
      .on('click', function () {
        var isValid = $(this).parent().siblings('form').valid();
        if (isValid) {
          alert('Submitted..!!');
        }
      });
  }

  // Vertical Wizard
  // --------------------------------------------------------------------
  if (typeof verticalWizard !== undefined && verticalWizard !== null) {
    var verticalStepper = new Stepper(verticalWizard, {
      linear: false
    });
    $(verticalWizard)
      .find('.btn-next')
      .on('click', function () {
        verticalStepper.next();
      });
    $(verticalWizard)
      .find('.btn-prev')
      .on('click', function () {
        verticalStepper.previous();
      });

    $(verticalWizard)
      .find('.btn-submit')
      .on('click', function () {
        alert('Submitted..!!');
      });
  }

  if (typeof verticalWizard1 !== undefined && verticalWizard1 !== null) {
    var verticalStepper1 = new Stepper(verticalWizard1, {
      linear: false
    });
    $(verticalWizard1)
      .find('.btn-next')
      .on('click', function () {
        verticalStepper1.next();
      });
    $(verticalWizard1)
      .find('.btn-prev')
      .on('click', function () {
        verticalStepper1.previous();
      });

    $(verticalWizard1)
      .find('.btn-submit')
      .on('click', function () {
        alert('Submitted..!!');
      });
  }

  if (typeof verticalWizard2 !== undefined && verticalWizard2 !== null) {
    var verticalStepper2 = new Stepper(verticalWizard2, {
      linear: false
    });
    $(verticalWizard2)
      .find('.btn-next')
      .on('click', function () {
        verticalStepper2.next();
      });
    $(verticalWizard2)
      .find('.btn-prev')
      .on('click', function () {
        verticalStepper2.previous();
      });

    $(verticalWizard2)
      .find('.btn-submit')
      .on('click', function () {
        alert('Submitted..!!');
      });
  }

  if (typeof verticalWizard3 !== undefined && verticalWizard3 !== null) {
    var verticalStepper3 = new Stepper(verticalWizard3, {
      linear: false
    });
    $(verticalWizard3)
      .find('.btn-next')
      .on('click', function () {
        verticalStepper3.next();
      });
    $(verticalWizard3)
      .find('.btn-prev')
      .on('click', function () {
        verticalStepper3.previous();
      });

    $(verticalWizard3)
      .find('.btn-submit')
      .on('click', function () {
        alert('Submitted..!!');
        location.href='';
      });
  }

  if (typeof verticalWizard4 !== undefined && verticalWizard4 !== null) {
    var verticalStepper4 = new Stepper(verticalWizard1, {
      linear: false
    });
    $(verticalWizard4)
      .find('.btn-next')
      .on('click', function () {
        verticalStepper4.next();
      });
    $(verticalWizard4)
      .find('.btn-prev')
      .on('click', function () {
        verticalStepper4.previous();
      });

    $(verticalWizard4)
      .find('.btn-submit')
      .on('click', function () {
        alert('Submitted..!!');
      });
  }

  if (typeof verticalWizard5 !== undefined && verticalWizard5 !== null) {
    var verticalStepper5 = new Stepper(verticalWizard5, {
      linear: false
    });
    $(verticalWizard5)
      .find('.btn-next')
      .on('click', function () {
        verticalStepper5.next();
      });
    $(verticalWizard5)
      .find('.btn-prev')
      .on('click', function () {
        verticalStepper5.previous();
      });

    $(verticalWizard5)
      .find('.btn-submit')
      .on('click', function () {
        alert('Submitted..!!');
      });
  }

  if (typeof verticalWizard6 !== undefined && verticalWizard6 !== null) {
    var verticalStepper6 = new Stepper(verticalWizard6, {
      linear: false
    });
    $(verticalWizard6)
      .find('.btn-next')
      .on('click', function () {
        verticalStepper6.next();
      });
    $(verticalWizard6)
      .find('.btn-prev')
      .on('click', function () {
        verticalStepper6.previous();
      });

    $(verticalWizard6)
      .find('.btn-submit')
      .on('click', function () {
        alert('Submitted..!!');
      });
  }

  if (typeof verticalWizard7 !== undefined && verticalWizard7 !== null) {
    var verticalStepper7 = new Stepper(verticalWizard7, {
      linear: false
    });
    $(verticalWizard7)
      .find('.btn-next')
      .on('click', function () {
        verticalStepper7.next();
      });
    $(verticalWizard7)
      .find('.btn-prev')
      .on('click', function () {
        verticalStepper7.previous();
      });

    $(verticalWizard7)
      .find('.btn-submit')
      .on('click', function () {
        alert('Submitted..!!');
      });
  }

  if (typeof verticalWizard8 !== undefined && verticalWizard8 !== null) {
    var verticalStepper8 = new Stepper(verticalWizard8, {
      linear: false
    });
    $(verticalWizard8)
      .find('.btn-next')
      .on('click', function () {
        verticalStepper8.next();
      });
    $(verticalWizard8)
      .find('.btn-prev')
      .on('click', function () {
        verticalStepper8.previous();
      });

    $(verticalWizard8)
      .find('.btn-submit')
      .on('click', function () {
        alert('Submitted..!!');
      });
  }

  if (typeof verticalWizard9 !== undefined && verticalWizard9 !== null) {
    var verticalStepper9 = new Stepper(verticalWizard9, {
      linear: false
    });
    $(verticalWizard9)
      .find('.btn-next')
      .on('click', function () {
        verticalStepper9.next();
      });
    $(verticalWizard9)
      .find('.btn-prev')
      .on('click', function () {
        verticalStepper9.previous();
      });

    $(verticalWizard9)
      .find('.btn-submit')
      .on('click', function () {
        alert('Submitted..!!');
      });
  }

  if (typeof verticalWizard10 !== undefined && verticalWizard10 !== null) {
    var verticalStepper10 = new Stepper(verticalWizard10, {
      linear: false
    });
    $(verticalWizard10)
      .find('.btn-next')
      .on('click', function () {
        verticalStepper10.next();
      });
    $(verticalWizard10)
      .find('.btn-prev')
      .on('click', function () {
        verticalStepper10.previous();
      });

    $(verticalWizard10)
      .find('.btn-submit')
      .on('click', function () {
        alert('Submitted..!!');
      });
  }

  $(".btn-style").click(function () {
    var target = $(".nav-tabs li.active");
    var sibbling;
    if ($(this).text() === "Next") {
        sibbling = target.next();
    } else {
        sibbling = target.prev();
    }
    if (sibbling.is("li")) {
        sibbling.children("a").tab("show");
    }
});
  // Modern Wizard
  // --------------------------------------------------------------------
  if (typeof modernWizard !== undefined && modernWizard !== null) {
    var modernStepper = new Stepper(modernWizard, {
      linear: false
    });
    $(modernWizard)
      .find('.btn-next')
      .on('click', function () {
        modernStepper.next();
      });
    $(modernWizard)
      .find('.btn-prev')
      .on('click', function () {
        modernStepper.previous();
      });

    $(modernWizard)
      .find('.btn-submit')
      .on('click', function () {
        alert('Submitted..!!');
      });
  }

  // Modern Vertical Wizard
  // --------------------------------------------------------------------
  if (typeof modernVerticalWizard !== undefined && modernVerticalWizard !== null) {
    var modernVerticalStepper = new Stepper(modernVerticalWizard, {
      linear: false
    });
    $(modernVerticalWizard)
      .find('.btn-next')
      .on('click', function () {
        modernVerticalStepper.next();
      });
    $(modernVerticalWizard)
      .find('.btn-prev')
      .on('click', function () {
        modernVerticalStepper.previous();
      });

    $(modernVerticalWizard)
      .find('.btn-submit')
      .on('click', function () {
        alert('Submitted..!!');
      });
  }
});
