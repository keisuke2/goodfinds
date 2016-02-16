$(function(){

  var repeat = 5;
  var correct = 0;

  var mode = 'normal';

  var startTime;
  var timer;

  showMenu();

  $('#typed').keyup(function(){
    if ($(this).val() === $('#pattern').text()) {
      if (repeat === ++correct) {
        finish();
      }
      $(this).val('');
      makePattern();
    }
  });

  function showMenu(){
    $('#field').hide();

    $('.mode').click(function(){
      $('#menu').hide();
      mode = $(this).val();
      start();
    });
  }

  function start(){
    $('#field').show();
    $('#typed').focus();

    correct = 0;
    startTime = new Date();
    makePattern();
    showTimer();
  }

  function finish(){
    clearTimeout(timer);
    alert($('#timer').text());

    $('#field').hide();
    $('#menu').show();
  }

  function makePattern(){
    $('#pattern').text(getRandomString(mode));
  }

  function getRandomString(level){
    var alph = 'abcdefghijklmnopqrstuvwxyz';
    var alphL = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    var nums = '1234567890';
    var signs = '!"#$%&()-_=^~¥|@[]{}+*,./<>?';

    var chars = '';
    var length = 0;
    switch (level) {
      case 'easy':
        chars = alph;
        length = 4;
        break;
      case 'normal':
        chars = alph + alphL;
        length = 6;
        break;
      case 'hard':
        chars = alph + alphL + nums;
        length = 8;
        break;
      case 'nightmare':
        chars = alph + alphL + nums + signs;
        length = 10;
        break;
    }

    var str = '';
    for (var i = 0; i < length; i++) {
      str += chars.charAt(Math.floor(Math.random() * chars.length));
    }
    return str;
  }

  function showTimer(){
    var now = new Date();
    $('#timer').text('time: ' + (now - startTime) / 1000);
    timer = setTimeout(showTimer, 10);
  }
});
