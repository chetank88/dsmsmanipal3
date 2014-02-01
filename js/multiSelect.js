var $selects = $('#s1>select');
$selects.on('change', function() {
$("option", $selects).prop("disabled", false);
$selects.each(function() {
var $select = $(this), 
$options = $selects.not($select).find('option'),
selectedText = $select.children('option:selected').text();
$options.each(function() {
if($(this).text() == selectedText) $(this).prop("disabled", true);
});
});
});
var $selects2 = $('#s2>select');
$selects2.on('change', function() {
$("option", $selects2).prop("disabled", false);
$selects2.each(function() {
var $select = $(this), 
$options = $selects2.not($select).find('option'),
selectedText = $select.children('option:selected').text();
$options.each(function() {
if($(this).text() == selectedText) $(this).prop("disabled", true);
});
});
});