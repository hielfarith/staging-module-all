/*=========================================================================================
	File Name: tour.js
	Description: tour
	----------------------------------------------------------------------------------------
	Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
	Author: Pixinvent
	Author URL: hhttp://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(function () {
    'use strict';

    var startBtn = $('.login-tour');
    // var startBtn = $('#tour');

        function setupTour(tour) {
            var backBtnClass = 'btn btn-sm btn-outline-primary',
            nextBtnClass = 'btn btn-sm btn-primary btn-next';
            tour.addStep({
            title: 'Navbar',
            text: 'This is your navbar',
                attachTo: {
                    element: '.navbar',
                    on: 'bottom'
                },
            buttons: [
                {
                action: tour.cancel,
                classes: backBtnClass,
                text: 'Skip'
                },
                {
                text: 'Next',
                classes: nextBtnClass,
                action: tour.next
                }
            ]
            });
            tour.addStep({
            title: 'User Management',
            text: 'Click here to register new internal/external user or to manage roles in this system',
                attachTo: {
                    element: '.nav-item.nav-tour.user-settings',
                    on: 'right'
                },
            buttons: [
                {
                text: 'Back',
                classes: backBtnClass,
                action: tour.back
                },
                {
                text: 'Next',
                classes: nextBtnClass,
                action: tour.next
                }
            ]
            });
            tour.addStep({
                title: 'System Settings',
                text: 'Click here to configure system and accessing system log',
                attachTo: {
                    element: '.nav-item.nav-tour.system-management',
                    on: 'right'
                },
                buttons: [
                    {
                    text: 'Back',
                    classes: backBtnClass,
                    action: tour.back
                    },
                    {
                    text: 'Next',
                    classes: nextBtnClass,
                    action: tour.next
                    }
                ]
            });
            tour.addStep({
                title: 'Application Management',
                text: 'Click here for list of application and manage application',
                attachTo: {
                    element: '.nav-item.nav-tour.application-management',
                    on: 'right'
                },
                buttons: [
                    {
                    text: 'Back',
                    classes: backBtnClass,
                    action: tour.back
                    },
                    {
                    text: 'Next',
                    classes: nextBtnClass,
                    action: tour.next
                    }
                ]
            });
            tour.addStep({
                title: 'Helpdesk',
                text: 'Click here for list of helpdesk and bug issued',
                attachTo: {
                    element: '.nav-item.nav-tour.helpdesk-admin',
                    on: 'right'
                },
                buttons: [
                    {
                    text: 'Back',
                    classes: backBtnClass,
                    action: tour.back
                    },
                    {
                    text: 'Next',
                    classes: nextBtnClass,
                    action: tour.next
                    }
                ]
            });
            tour.addStep({
            title: 'Footer',
            text: 'This is the footer',
                attachTo: {
                    element: '.footer', on: 'top'
                },
            buttons: [
                {
                text: 'Back',
                classes: backBtnClass,
                action: tour.back
                },
                {
                text: 'Finish',
                classes: nextBtnClass,
                action: tour.cancel
                }
            ]
            });

            return tour;
        }

        if (startBtn.length) {
            startBtn.on('click', function () {
                var tourVar = new Shepherd.Tour({
                defaultStepOptions: {
                    classes: 'shadow-md bg-purple-dark',
                    scrollTo: false,
                    cancelIcon: {
                        enabled: true
                    }
                },
                useModalOverlay: true
            });

            setupTour(tourVar).start();
            });
        }
            startBtn.trigger('click');

  });
