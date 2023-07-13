$((function(){"use strict";var e=document.querySelectorAll(".bs-stepper"),n=$(".select2"),i=document.querySelector(".horizontal-wizard-example"),t=document.querySelector(".vertical-wizard-example"),r=document.querySelector(".vertical-wizard-1-example"),o=document.querySelector(".vertical-wizard-2-example"),c=document.querySelector(".vertical-wizard-3-example"),l=document.querySelector(".vertical-wizard-4-example"),u=document.querySelector(".vertical-wizard-5-example"),d=document.querySelector(".modern-wizard-example"),a=document.querySelector(".modern-vertical-wizard-example");if(void 0!==typeof e&&null!==e)for(var f=0;f<e.length;++f)e[f].addEventListener("show.bs-stepper",(function(e){for(var n=e.detail.indexStep,i=$(e.target).find(".step").length-1,t=$(e.target).find(".step"),r=0;r<n;r++){t[r].classList.add("crossed");for(var o=n;o<i;o++)t[o].classList.remove("crossed")}if(0==e.detail.to){for(var c=n;c<i;c++)t[c].classList.remove("crossed");t[0].classList.remove("crossed")}}));if(n.each((function(){var e=$(this);e.wrap('<div class="position-relative"></div>'),e.select2({placeholder:"Select value",dropdownParent:e.parent()})})),void 0!==typeof i&&null!==i){var s=new Stepper(i);$(i).find("form").each((function(){$(this).validate({rules:{username:{required:!0},email:{required:!0},password:{required:!0},"confirm-password":{required:!0,equalTo:"#password"},"first-name":{required:!0},"last-name":{required:!0},address:{required:!0},landmark:{required:!0},country:{required:!0},language:{required:!0},twitter:{required:!0,url:!0},facebook:{required:!0,url:!0},google:{required:!0,url:!0},linkedin:{required:!0,url:!0}}})})),$(i).find(".btn-next").each((function(){$(this).on("click",(function(e){$(this).parent().siblings("form").valid()?s.next():e.preventDefault()}))})),$(i).find(".btn-prev").on("click",(function(){s.previous()})),$(i).find(".btn-submit").on("click",(function(){$(this).parent().siblings("form").valid()&&alert("Submitted..!!")}))}if(void 0!==typeof t&&null!==t){var p=new Stepper(t,{linear:!1});$(t).find(".btn-next").on("click",(function(){p.next()})),$(t).find(".btn-prev").on("click",(function(){p.previous()})),$(t).find(".btn-submit").on("click",(function(){alert("Submitted..!!")}))}if(void 0!==typeof r&&null!==r){var v=new Stepper(r,{linear:!1});$(r).find(".btn-next").on("click",(function(){v.next()})),$(r).find(".btn-prev").on("click",(function(){v.previous()})),$(r).find(".btn-submit").on("click",(function(){alert("Submitted..!!")}))}if(void 0!==typeof o&&null!==o){var b=new Stepper(o,{linear:!1});$(o).find(".btn-next").on("click",(function(){b.next()})),$(o).find(".btn-prev").on("click",(function(){b.previous()})),$(o).find(".btn-submit").on("click",(function(){alert("Submitted..!!")}))}if(void 0!==typeof c&&null!==c){var m=new Stepper(c,{linear:!1});$(c).find(".btn-next").on("click",(function(){m.next()})),$(c).find(".btn-prev").on("click",(function(){m.previous()})),$(c).find(".btn-submit").on("click",(function(){alert("Submitted..!!"),location.href=""}))}if(void 0!==typeof l&&null!==l){var k=new Stepper(r,{linear:!1});$(l).find(".btn-next").on("click",(function(){k.next()})),$(l).find(".btn-prev").on("click",(function(){k.previous()})),$(l).find(".btn-submit").on("click",(function(){alert("Submitted..!!")}))}if(void 0!==typeof u&&null!==u){var x=new Stepper(u,{linear:!1});$(u).find(".btn-next").on("click",(function(){x.next()})),$(u).find(".btn-prev").on("click",(function(){x.previous()})),$(u).find(".btn-submit").on("click",(function(){alert("Submitted..!!")}))}if($(".btn-style").click((function(){var e,n=$(".nav-tabs li.active");(e="Next"===$(this).text()?n.next():n.prev()).is("li")&&e.children("a").tab("show")})),void 0!==typeof d&&null!==d){var S=new Stepper(d,{linear:!1});$(d).find(".btn-next").on("click",(function(){S.next()})),$(d).find(".btn-prev").on("click",(function(){S.previous()})),$(d).find(".btn-submit").on("click",(function(){alert("Submitted..!!")}))}if(void 0!==typeof a&&null!==a){var w=new Stepper(a,{linear:!1});$(a).find(".btn-next").on("click",(function(){w.next()})),$(a).find(".btn-prev").on("click",(function(){w.previous()})),$(a).find(".btn-submit").on("click",(function(){alert("Submitted..!!")}))}}));
