<script type="text/javascript">

//autoload
$(function() {
  $('#modal-tip').show();
});
//btn-close onclick
$('#btn-close').on('click', function() {
  $('#modal-tip').hide();
  $('#div-tip').show();
});

//btn-sub onclick
$('#btn-sub').on('click', function() {
  $('#modal-tip').hide();
  //change span-username & h1-username
  var tmp = $('#input-username').val();
  //change h1-username
  if (tmp == '') {
    $('#div-tip').show();
    $('#h1-username').text('Now`s Tourist');
  } else {
    //change span-username
    $('#span-username').text(tmp);
    $('#span-username').attr('onclick','return false;');
    $('#div-tip').hide();
    $('#div-content').show();
    $('#h3-username').text('Welcome To ' + tmp);
    GetCount(0,0);
  }
});

//span-close onclick
$('#span-close').on('click', function() {
  $('#modal-tip').hide();
  $('#div-tip').show();
  $('#h1-username').text('Now`s Tourist');
});

//li-1 onclick
$('#li-1').on('click', function() {
  $('#li-1').attr('class', 'active');
  $('#div-lottery').show();
  $('#div-recode').hide();
  $('#li-2').attr('class', '');
});

//li-2 onclick
$('#li-2').on('click', function() {
  $('#li-1').attr('class', '');
  $('#li-2').attr('class', 'active');
  $('#div-recode').show();
  $('#div-lottery').hide();
});

//a-show onclick
$('#a-show').on('click', function() {
  $('#div-tip').hide();
  $('#modal-tip').show();
});

//btn-get-award onclick
$('#btn-get-award').on('click', function() {
  //GetAward();
  
  var tmp_count = $('#span-count').text();
  //alert(tmp_count);
  if (tmp_count > 0) {
    GetCount(1,tmp_count-1); 
    //SetAward(tmp_count);
  }
});
/**
 * define functions
 **/
//Interaction functions

var tmp_no = 1;
function GetCount(temp1,temp2) {
  var tmp = $('#span-username').text();
  switch(temp1){
    case 0:
     $.get('{{url('getcount')}}' + '/' + tmp, {}, function(back) {
     console.log('count1: '+back.count);
     $('#span-count').text(back.count);
  }, 'json');
    break;
    case 1:
    default:
    $.get('{{url('getaward')}}' + '/' + tmp, {}, function(back) {
      console.log('awardname: '+back.awardname);
      console.log('time: '+back.time.date);
      console.log('count2: '+back.count);
      var tmp_1 = '<tr><td>';
      var tmp_2 = '</td><td>';
      var tmp_3 = '</td><td>';
      var tmp_4 = '</td></tr>';
      $('#table-body').append(tmp_1 + tmp_no + tmp_2 + back.awardname + tmp_3 + back.time.date + tmp_4);
      $('#span-count').text(temp2);
      tmp_no++;
  }, 'json');   
    break;
  }
}
</script>