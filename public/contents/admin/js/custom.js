$(document).ready(function(){
  $(".userapprove").click(function(){
    var url=$(this).data('userstatus');
    $('#userapprove').attr('action',url);
  });
});

$(document).ready(function(){
  $(".userreject").click(function(){
    var url=$(this).data('userstatus');
    $('#userreject').attr('action',url);
  });
});

$(document).ready(function(){
  $(".softdelete").click(function(){
    var url=$(this).data('softdelete');
    $('#softdelete').attr('action',url);
  });
});

$(document).ready(function(){
  $(".userrestore").click(function(){
    var url=$(this).data('userrestore');
    $('#userrestore').attr('action',url);
  });
});

$(document).ready(function(){
  $(".harddelete").click(function(){
    var url=$(this).data('harddelete');
    $('#harddelete').attr('action',url);
  });
});

$(document).ready(function(){
  $(".incomecategorydelete").click(function(){
    var url=$(this).data('incomecategorydelete');
    $('#incomecategorydelete').attr('action',url);
  });
});

$(document).ready(function(){
  $(".incomesoftdelete").click(function(){
    var url=$(this).data('incomesoftdelete');
    $('#incomesoftdelete').attr('action',url);
  });
});

$(document).ready(function(){
  $(".incomerestore").click(function(){
    var url=$(this).data('incomerestore');
    $('#incomerestore').attr('action',url);
  });
});

$(document).ready(function(){
  $(".incomeharddelete").click(function(){
    var url=$(this).data('incomeharddelete');
    $('#incomeharddelete').attr('action',url);
  });
});

$(document).ready(function(){
  $(".expensecategorydelete").click(function(){
    var url=$(this).data('expensecategorydelete');
    $('#expensecategorydelete').attr('action',url);
  });
});

$(document).ready(function(){
  $(".expensesoftdelete").click(function(){
    var url=$(this).data('expensesoftdelete');
    $('#expensesoftdelete').attr('action',url);
  });
});

$(document).ready(function(){
  $(".expenserestore").click(function(){
    var url=$(this).data('expenserestore');
    $('#expenserestore').attr('action',url);
  });
});

$(document).ready(function(){
  $(".expenseharddelete").click(function(){
    var url=$(this).data('expenseharddelete');
    $('#expenseharddelete').attr('action',url);
  });
});

$(document).ready(function(){
  $(".loanerapprove").click(function(){
    var url=$(this).data('loanerstatus');
    $('#loanerapprove').attr('action',url);
  });
});

$(document).ready(function(){
  $(".loanereject").click(function(){
    var url=$(this).data('loanerstatus');
    $('#loanereject').attr('action',url);
  });
});

$(document).ready(function(){
  $(".loangiventdelete").click(function(){
    var url=$(this).data('loangiventdelete');
    $('#loangiventdelete').attr('action',url);
  });
});

$(document).ready(function(){
  $(".loanreceivedelete").click(function(){
    var url=$(this).data('loanreceivedelete');
    $('#loanreceivedelete').attr('action',url);
  });
});

$(document).ready(function(){
  $(".softdeleteloaner").click(function(){
    var url=$(this).data('softdeleteloaner');
    $('#softdeleteloaner').attr('action',url);
  });
});

$(document).ready(function(){
  $(".loanerrestore").click(function(){
    var url=$(this).data('loanerrestore');
    $('#loanerrestore').attr('action',url);
  });
});

$(document).ready(function() {
  $(".loangiven").click(function(event) {
      var u_id = $(this).attr('href');
      event.preventDefault();
      document.getElementById("hiddenVal1").value = u_id;
  });
});

$(document).ready(function() {
  $(".loanreceive").click(function(event) {
      var id = $(this).attr('href');
      event.preventDefault();
      document.getElementById("hiddenVal2").value =id;
  });
});

//Datepicker setting code start
  $(function () {
    $('#picker').datetimepicker({
      timepicker:true,
      datepicker:true,
      // format:'Y-m-d',
      format:'Y-m-d H:i:s a',
      // weeks:true,
      // value:'2019-08-1 09:45 am',
      hours12:false,
      // step:30,
      // yearStart:2015,
      // yearEnd:2025,
    });

    $('#pickerForm').datetimepicker({
      timepicker:false,
      datepicker:true,
      format:'Y-m-d',
      hours12:false,
  		// autoclose: true,
  		// format: 'yyyy-mm-dd',
  		// todayHighlight: true
  	});

  	$('#pickerTo').datetimepicker({
      timepicker:false,
      datepicker:true,
      format:'Y-m-d',
      hours12:false,
  		// autoclose: true,
  		// format: 'yyyy-mm-dd',
  		// todayHighlight: true
  	});

    $('#datepicker_given_date').datetimepicker({
      timepicker:false,
      datepicker:true,
      format:'Y-m-d',
      hours12:false,
  	});

    $('#datepicker_receive_date').datetimepicker({
      timepicker:false,
      datepicker:true,
      format:'Y-m-d',
      hours12:false,
  	});

  });


//Searching code start
  $(document).ready(function(){
    $( "#search" ).click(function() {
      var from = $('#pickerForm').val();
      var to = $('#pickerTo').val();
      var base_url = window.location.origin;
      var url = base_url+'/admin/summary/search/'+from+'/'+to;
      location.href = url;
    });
  });


  //DataTable setting code start
  $(document).ready(function() {
    $('#datatable').dataTable( {
      "ordering": false
    } );


    $('#summary').dataTable({
  		"paging": true,
  		"lengthChange": false,
  		"searching": false,
  		"ordering": false,
  		"info": true,
  		"autoWidth": false,
  		"order": [[ 0, "desc" ]],
  	});

  } );
