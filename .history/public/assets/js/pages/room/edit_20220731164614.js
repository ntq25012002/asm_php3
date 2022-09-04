console.log($('#images-old').data('filepath'));

input = $('.form-data-image input'); // file input
input.val($('#images-old').data('filepath'));

console.log(input);