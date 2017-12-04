//autoload
$(function() {
	$('#modal-tip').show();
	//Initialize Variables
	var tmp_no = 1;
	var tmp_award = '';
	var tmp_time = '';
	var tmp_name = '';
	var tmp_count = 0;
	var tmp_id = 0;
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
		$('#div-tip').hide();
		$('#div-content').show();
		$('#h3-username').text('Welcome To ' + tmp);
		$('#span-count').text(tmp_count);
	}
});
//span-close onclick
$('#span-close').on('click', function() {
	$('#modal-tip').hide();
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
	GetCount();
});
//a-show onclick
$('#a-show').on('click', function() {
	$('#div-tip').hide();
	$('#modal-tip').show();
});
//btn-get-award onclick
$('#btn-get-award').on('click', function() {
	while (tmp_count > 0) {
		var tmp_1 = '<tr><td>';
		var tmp_2 = '</td><td>';
		var tmp_3 = '</td><td>';
		var tmp_4 = '</td></tr>';
		$('#table-body').append(tmp_1 + tmp_no + tmp_2 + tmp_award + tmp_3 + tmp_time + tmp_4);
		tmp_count--;
		tmp_no++;
		$('#span-count').text(tmp_count);
	}
});
/**
 * define functions
 **/
//Interaction functions

function GetCount() {
	$.post({{url('getcount')}}, {
		'type': 'getcount',
	}, function(back) {
		tmp_count = back.count;
	});
}

function SetCount() {
	$.post({{url('setcount')}}, {
		'type': 'setcount',
	}, function(back) {
		tmp_count = back.count;
	});
}

function GetInfo() {
	$.post({{url('getinfo')}}, {
		'type': 'getinfo',
	}, function(back) {
		tmp_awards = back.awardname;
		tmp_times = back.time;
		tmp_names = back.username;
		tmp_ids = back.id;
	});
}

function SendInfo() {
	$.post({{url('sendinfo')}}, {
		'type': 'sendinfo',
	}, function(back) {
		 
	});
}