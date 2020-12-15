//body load
$('body').css('display', 'none');
$('body').fadeIn(1250);

$('.fa').on('click', function(){
$('body').fadeOut(1250);

});

//color the names
$(document).ready(function(){
//$(window).load(function() {
$("figcaption:contains('Red')").html(function(_, html) {
return html.replace(/(Red)/g, '<span class="red">Red</span>');
});

$("figcaption:contains('Burgundy')").html(function(_, html) {
return html.replace(/(Burgundy)/g, '<span class="burgundy">Burgundy</span>');
});

$("figcaption:contains('Orange')").html(function(_, html) {
return html.replace(/(Orange)/g, '<span class="orange">Orange</span>');
});

$("figcaption:contains('Yellow')").html(function(_, html) {
return html.replace(/(Yellow)/g, '<span class="yellow">Yellow</span>');
});

$("figcaption:contains('Green')").html(function(_, html) {
return html.replace(/(Green)/g, '<span class="green">Green</span>');
});

$("figcaption:contains('Blue')").html(function(_, html) {
return html.replace(/(Blue)/g, '<span class="blue">Blue</span>');
});

$("figcaption:contains('Teal')").html(function(_, html) {
return html.replace(/(Teal)/g, '<span class="teal">Teal</span>');
});

$("figcaption:contains('Purple')").html(function(_, html) {
return html.replace(/(Purple)/g, '<span class="purple">Purple</span>');
});

$("figcaption:contains('Plum')").html(function(_, html) {
return html.replace(/(Plum)/g, '<span class="plum">Plum</span>');
});

$("figcaption:contains('Magenta')").html(function(_, html) {
return html.replace(/(Magenta)/g, '<span class="magenta">Magenta</span>');
});

$("figcaption:contains('Pink')").html(function(_, html) {
return html.replace(/(Pink)/g, '<span class="pink">Pink</span>');
});

$("figcaption:contains('Brown')").html(function(_, html) {
return html.replace(/(Brown)/g, '<span class="brown">Brown</span>');
});

$("figcaption:contains('Gray')").html(function(_, html) {
return html.replace(/(Gray)/g, '<span class="gray">Gray</span>');
});

$("figcaption:contains('Black')").html(function(_, html) {
return html.replace(/(Black)/g, '<span class="black">Black</span>');
});

//});
});
