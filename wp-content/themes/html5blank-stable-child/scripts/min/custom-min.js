$(document).ready(function(){$("#navigation a, #fixedbar a").on("click",function(n){}),$(window).on("scroll",function(){var n=$(this).scrollTop();n>=820?$("#fixedbar").fadeIn(250):820>=n&&$("#fixedbar").fadeOut(250)})}),$(document).ready(function(){$(".service a").on("click",function(n){n.preventDefault()})});