<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view( 'templates/head_view' ); ?>
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/src/plugins/jquery-steps/build/jquery.steps.css">
</head>
<body>
    <?php $this->load->view( 'templates/header_view' ); ?>
    <?php $this->load->view( 'templates/sidebar_view' ); ?>
    <div class="main-container">
        <div class="pd-ltr-20 height-100-p xs-pd-20-10">
            <div class="min-height-200px">
                <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                    <div class="wizard-content">
                     <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="text-blue">New Pledge</h4>
                            <p class="mb-30 font-14">New pledge towards the CFM Magadi church building</p>
                        </div>
                    </div>
                    <form name="pledge-form" id="pledge-form"class="tab-wizard wizard-circle wizard">
                        <h5>Pledge Info</h5>
                        <section>
                           <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Pledge Member</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select col-12" id="pledgemember" name="pledgemember">
                                    <option selected="">Choose...</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Pledge Name</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" name="pledgename" placeholder="Pledge Name (e.g Jesus Jar) ">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Pledge Stake</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select col-12" id="pledgestake" name="pledgestake">
                                    <option selected="">Choose...</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label form-control-label">Pledge Amount</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control form-control-info" type="text" id="pledgeamount" name="pledgeamount" placeholder="Enter Amount within stake range">
                                <div class="form-control-feedback">*required.</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Pledge Payment Period</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select col-12" id="pledgeperiod" name="pledgeperiod">
                                    <option selected="">Choose...</option>
                                </select>
                            </div>
                        </div>
                    </section>
                    <!-- Step 2 -->
                    <h5>Payments Plan</h5>
                    <section>
                        <div class="row">
                            <div class="col-md-12 column">
                                <div class="clearfix mb-20">
                                    <div class="pull-left">
                                        <h4 class="text-blue"  id="paymentplan">Payment plan</h4>
                                        <p>(<span id="paymentscount"></span>)</p>
                                    </div>
                                    <div class="pull-right">
                                        <a href="#basic-table" class="btn btn-primary btn-sm scroll-click" rel="content-y" data-toggle="collapse" role="button"><i class="fa fa-code"></i> Reset Plan</a>
                                    </div>
                                </div>
                                <table class="table table-hover" id="tab_logic">
                                  <thead>
                                    <tr >
                                      <th class="text-center">
                                        #
                                    </th>
                                    <th class="text-center">
                                        Payment
                                    </th>
                                    <th class="text-center">
                                        Date
                                    </th>
                                    <th class="text-center">
                                        Amount
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id='addr0'>
                                  <td>
                                    1
                                </td>
                                <td>
                                    <input type="text" name='payment0' placeholder='Initial Payment' class="form-control" disabled="" />
                                </td>
                                <td>
                                    <input type="text" name='date0'  placeholder='Date' value="26 August 2018" class="form-control date-picker"/>
                                </td>
                                <td>
                                    <input type="text" name='amount0' placeholder='amount' class="form-control"/>
                                </td>
                            </tr>
                            <tr id='addr1'></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </form>
</div>
</div>
<!-- success Popup html Start -->
<div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center font-18">
                <h3 class="mb-20">Form Submitted!</h3>
                <div class="mb-30 text-center"><img src="vendors/images/success.png"></div>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Done</button>
            </div>
        </div>
    </div>
</div>
<!-- success Popup html End -->
</div>
<?php $this->load->view('templates/footer_view'); ?>
</div>
</div>

<?php $this->load->view( 'templates/script' ); ?>
<script src="<?= base_url();?>assets/src/plugins/jquery-steps/build/jquery.steps.js"></script>
<script>
    $(".tab-wizard").steps({
        headerTag: "h5",
        bodyTag: "section",
        transitionEffect: "fade",
        titleTemplate: '<span class="step">#index#</span> #title#',
        labels: {
            finish: "Submit"
        },
        onFinished: function (event, currentIndex) {
            $('#success-modal').modal('show');
        }
    });

    $('document').ready(function () {

      $.getJSON('<?= base_url()."api/lookup/members/json";?>', function (data) {
          console.log(data);
          var $select = $('#pledgemember'); 
          $select.find('option').remove();  

          $.each(data,function(key, value) {
            console.log('key '+ value.member.fullName)
            $select.append('<option value=' + value.member.id + '>' + value.member.fullName + '</option>');
        });
      });

      $.getJSON('<?= base_url()."api/lookup/stakes/json";?>', function (data) {
          console.log(data);
          var $select = $('#pledgestake'); 
          $select.find('option').remove();  

          $.each(data,function(key, value) {
            console.log('key '+ value.pledgeStake.name)
            $select.append('<option value=' + value.pledgeStake.id + '>' + value.pledgeStake.name + '  ('+ value.pledgeStake.minimum.toLocaleString()+' - '+value.pledgeStake.maximum.toLocaleString() + ')</option>');
        });


      });

      $.getJSON('<?= base_url()."api/lookup/paymentperiods/json";?>', function (data) {
          console.log(data);
          var $select = $('#pledgeperiod'); 
          $select.find('option').remove();  

          $.each(data,function(key, value) {
            console.log('key '+ value.paymentPeriod.name)
            $select.append('<option value=' + value.paymentPeriod.id + '>' + value.paymentPeriod.name + '</option>');
        });

      });

      $("#pledgestake").val($("#pledgestake option:first").val());
      $("#pledgemember").val($("#pledgemember option:first").val());
      $("#pledgeperiod").val($("#pledgeperiod option:first").val());

      $('#paymentperiod').text($('#pledgeperiod option:selected').text());

      var i=1;
      var j=1;
      $("#add_row").click(function(){
        $('#addr'+i).html("<td>"+ (i+1) +"</td><td><input name='payment"+i+"' type='text' placeholder='Payment "+j+"' class='form-control input-md'  /> </td><td><input  name='date"+i+"' type='text' placeholder='date'  class='form-control date-picker'></td><td><input  name='amount"+i+"' type='text' placeholder='amount'  id='amount"+i+"'  class='form-control input-md'></td>");
        $('.date-picker').datepicker({
            language: 'en',
            autoClose: true,
            dateFormat: 'dd MM yyyy',
        });
        $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
        i++; 
        j++; 
    });

// annual = 2
// bi-annual = 4
// Quarterly = 8
// monthly = 24

$("#delete_row").click(function(){
   if(i>1){
     $("#addr"+(i-1)).html('');
     i--;
 }
});


$("a[href$='next']").click(function(e){
    $('#paymentPeriod').text($('#pledgeperiod option:selected'). text());

    var pledgeperiod = $('#pledgeperiod option:selected').text();
    var pledgeamount = $('#pledgeamount').val();
    $('#paymentplan').html('KES '+pledgeamount.toLocaleString());

    if (pledgeperiod.toLowerCase() =='monthly'){        
        amortize(24,pledgeamount,pledgeperiod);
    }
    if (pledgeperiod.toLowerCase() =='quarterly'){
        amortize(8,pledgeamount,pledgeperiod);
    }
    if (pledgeperiod.toLowerCase() =='anually'){
        amortize(2,pledgeamount,pledgeperiod);
    }
    if (pledgeperiod.toLowerCase() =='one off'){
        amortize(1,pledgeamount,pledgeperiod);
    }

    e.preventDefault();

});

});


    $("a[href$='finish']").click(function(e){
        var url = "<?= base_url();?>api/createpledge";
        var data =  $('#pledge-form').serializeArray();

        $.post(url, data, function(result,status){
            console.log(result);
                // window.location = result.redirect;
                NProgress.done();
            });


    })

    function amortize(frequency, totalamount,pledgeperiod){
        NProgress.start();
        $('#paymentscount').text(frequency +' payments paid '+pledgeperiod);
        var initialpayment = (frequency == 1 ? totalamount : totalamount*0.2);

        var installments = (totalamount-initialpayment)/frequency;
   // switch()
   var days_spread = 24/frequency;

   $("#tab_logic tbody").html("<tr id='addr'><td>1</td><td><input type='text' name='payment'  placeholder='Initial Payment' class='form-control' disabled='' /></td><td><input type='text' name='date' value='26 August 2018'  placeholder='Date' class='form-control date-picker'/></td><td><input type='text' name='amount' placeholder='amount'  value='"+Math.round(initialpayment).toLocaleString()+"' class='form-control'/></td></tr>");

   for (var i = 0; i <= frequency;) {
      var j=1;

      console.log(days_spread*i + 'months');
      console.log(moment().add(days_spread*i, 'months').format("DD MMMM YYYY"));
      var dt = moment('26 August 2018').add(days_spread*i, 'months').format("DD MMMM YYYY");



      $('#addr'+i).html("<td>"+ (i+1) +"</td><td><input name='payment"+i+"' type='text' placeholder='Payment "+i+"' class='form-control input-md'  /> </td><td><input  id='date"+i+"'  name='date"+i+"' type='text' placeholder='date'  class='form-control date-picker'></td><td><input  name='amount"+i+"' type='text' placeholder='amount' value='"+Math.round(installments).toLocaleString()+"'  id='amount"+i+"'  class='form-control input-md'></td>");


      var date = new Date(dt);
      $('#date'+i).val(dt);

      $('.datepicker').datepicker({
        language: 'en',
        autoClose: true,
        dateFormat: 'dd MM yyyy'            
    });

      $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');

      j++; 
      i++
  }
  NProgress.done();
}

</script>
</body>
</html>