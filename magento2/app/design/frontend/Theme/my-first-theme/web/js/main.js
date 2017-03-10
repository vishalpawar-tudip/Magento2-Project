define([
  "jquery",
], 
function($) {
  var jq = $.noConflict();
    jq(document).ready(function(){
      console.log("Hiiiii");       
      jq('li.level1.blog-mx.nav-4-5.last.ui-menu-item').children().last().attr('href','http://localhost/magento2/blog/');
        jq('.MyClass').insertBefore('#maincontent');

    });


   
  return;
});





