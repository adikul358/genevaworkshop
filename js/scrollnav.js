var lastId,
    topMenu = $("#header"),
    topMenuHeight = topMenu.outerHeight(),
    menuItems = $(".nav-menu").find("a"),
    scrollItems = menuItems.map(function(){
      var item = $($(this).attr("href"));
      if (item.length) { return item; }
    });
console.log(menuItems);
$(window).scroll(function(){
   var fromTop = $(this).scrollTop()+topMenuHeight;
   var cur = scrollItems.map(function(){
     if ($(this).offset().top < fromTop)
       return this;
   });
   cur = cur[cur.length-1];
   var id = cur && cur.length ? cur[0].id : "";
   if (lastId !== id) {
       lastId = id;
       menuItems
         .parent().removeClass("menu-active")
         .end().filter("[href='#"+id+"']").parent().addClass("menu-active");
   }                   
});

$(document).ready(function(){
   var fromTop = $(this).scrollTop()+topMenuHeight;
   var cur = scrollItems.map(function(){
     if ($(this).offset().top < fromTop)
       return this;
   });
   cur = cur[cur.length-1];
   var id = cur && cur.length ? cur[0].id : "";
   if (lastId !== id) {
       lastId = id;
       menuItems
         .parent().removeClass("menu-active")
         .end().filter("[href='#"+id+"']").parent().addClass("menu-active");
   }                   
});