<div id="preloader">
  <div id="loader"></div>
</div>

<li class="bar">
  <div class="main">
    <span class="flex-putih">SOAL NO. </span>
    <span class="flex-kosong" id="soal">Nomer</span>
    <span class="flex-biru"> <div id="h_timer"></div></span>
    <span class="flex-abu">Sisa Waktu</span>            
  </div>
</li>

<div id="fontlembarsoal" class="fontlembarsoal">
  <span id="hurufsoal"> Ukuran font soal : 
    <a style="font-size:16px;" href="#">&nbsp; A &nbsp;</a>
    <a style="font-size:14px;" id="jfontsize-d2" href="#">&nbsp; A &nbsp;</a>
    <a style="font-size:12px;" id="jfontsize-p2" href="#">&nbsp; A &nbsp;</a>
    </span>
</div>   

<script type="text/javascript" src="<?=base_url('assets/js/jquery-2.0.3.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/jquery.countdownTimer.min.js')?>"></script>                   
<script>

$(function(){
  $('#h_timer').countdowntimer({
    hours : <?=substr($time, 0,2)?>,
    minutes :<?=substr($time, 3,2)?>,
    seconds :<?=substr($time, 6,2)?>,                           
    size : "lg",
    timeUp : timeisUp                                                           
  });
  question();
  updateTimer();
});

function updateTimer()
{
  setTimeout(function(){
    $.ajax({
        type:"GET",
        url: "<?=site_url('student/test/update_timer/')?>",
        data: 'TestID='+<?=$test->TestID?>+'&Remain='+$('#h_timer').text(),
        success: function(data)
        { 
        }
      })
      updateTimer();
  }, 3000);
}

function timeisUp() {
  alert("Waktu pengerjaan sudah habis");
  setTimeout(function() { 
    window.location.href = $("a")[0].href; 
  }, 2000);
  //Code to be executed when timer expires.
  window.location="<?=site_url('student/test/finish/')?>";
}

function question(id,no){
  if(id==null){
    id=<?=$number->row('QuestionID')[0]?>;
    no=1;
  }

  console.log('this', no)
  if(no >= <?=$number->num_rows()?>)
  {
    $("#btnNextSoal").hide();
    $("#btnFinish").show();
  }
  else
  { 
    $("#btnNextSoal").show();
    $("#btnFinish").hide();
  }

  $.ajax({
    type:"POST",
    url: "<?=site_url('student/test/question/')?>"+id,
    data: 'id='+<?=$this->session->userdata('StudentID')?>,
      success: function(data)
      { 
        $("#question").html(data);
        list();
        $("#preloader").fadeOut('slow');
      }
  });
  $('#soal').html(no);
}

  function save_answer(QuestionID, Answer){
        $.ajax({
          type:"POST",
          url: "<?=site_url('student/test/save_answer/')?>",
          data: 'QuestionID='+QuestionID+'&Answer='+Answer,
            success: function(data)
            { 
              question(QuestionID, document.getElementById('soal').innerHTML);
              $("#preloader").fadeOut('slow');
          }
        });
  }

  function uncertain(QuestionID){
        $.ajax({
          type:"POST",
          url: "<?=site_url('student/test/uncertain/')?>",
          data: 'QuestionID='+QuestionID,
            success: function(data)
            { 
              question(QuestionID, document.getElementById('soal').innerHTML);
          }
        });
  }

  $(document).keydown(function(e) { 
      var soale = $('#answer').val();                  

      if (e.which == 65) {
      var tekan = 'A';
      document.getElementById("A").checked = true;
      save_answer($("#QuestionID").val(), tekan); 
      } 
      else if (e.which == 66) {
      var tekan = 'B';    
      document.getElementById("B").checked = true;
      save_answer($("#QuestionID").val(), tekan); 
      }
      else if (e.which == 67) {
      var tekan = 'C';      
      document.getElementById("C").checked = true;  
      save_answer($("#QuestionID").val(), tekan);   
      }
      else if (e.which == 68) {
      var tekan = 'D';      
      document.getElementById("D").checked = true; 
      save_answer($("#QuestionID").val(), tekan);    
      }
      else if (e.which == 69) {
      var tekan = 'E';      
      document.getElementById("E").checked = true;
      save_answer($("#QuestionID").val(), tekan); 
      }
  });
    function list(){
      $.ajax({
        type:"POST",
        url: "<?=site_url('student/test/list_question/')?>",
        success: function(data)
        { 
          document.getElementById('container2').innerHTML = data;

            var container = document.querySelector('#container2');
            var msnry = new Masonry( container, {
              columnWidth: 55,
              //select all grid boxes
              itemSelector: '.item',
              //gutter property here
              gutter: 17
            });
        }
      });
      QuestionID = $('#QuestionID').val();
      $.ajax({
        type:"POST",
        url: "<?=site_url('student/test/check_uncertain/')?>",
        data: 'QuestionID='+QuestionID,
        success: function(data)
        { 
            if(data == 0){
              document.getElementById("uncertain").checked = true;
              $("#soal").attr('class', 'flex-kuning');
            }
            else if(data == 2){
              document.getElementById("uncertain").checked = false;
              $("#soal").attr('class', 'flex-kosong');
            }
            else{
              document.getElementById("uncertain").checked = false;
              $("#soal").attr('class', 'flex-item');
            }
        }
      });
    }
  function randomKey()
  {
    $('#randomKey').attr('key', Math.floor(Math.random() * 101));
    $('#uncertain').attr('key', Math.floor(Math.random() * 101));
    return Math.floor(Math.random() * 101);
  }
</script>

<script src="<?=base_url('assets/js/jquery-scrolltofixed.js')?>" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        $('.bar').scrollToFixed();
        $('.footer').scrollToFixed( {
            bottom: 0,
            limit: $('.footer').offset()
        });
        var summaries = $('.summary');
        summaries.each(function(i) {
            var summary = $(summaries[i]);
            var next = summaries[i + 1];

            summary.scrollToFixed({
                marginTop: $('.bar').outerHeight(true) + 10,
                limit: function() {
                    var limit = 0;
                    if (next) {
                        limit = $(next).offset().top - $(this).outerHeight(true) - 10;
                    } else {
                        limit = $('.footer').offset().top - $(this).outerHeight(true) - 10;
                    }
                    return limit;
                },
                zIndex: 999
            });
        });
    });
</script>

<div id="lembaran">
  <div id="lembaransoal">
    <div class="cc-selector">
            <div id="question"></div>
          </div>
        </div>
      </div>

  <div id="slideMenu" class="closed">
    <div class="contente">
      <!-- <div style="padding-bottom:20px; font-size:14px; color:#0066CC">Soal Pilihan Ganda</div> -->
      <div id="container2">

      </div>
    </div>
  </div>

          <a href="javascript:AlertIt();" class="toggleBtn" id="toggleLink">
            <div id="awal" align="center" style="display:none;"><font size="+3"> > </font></div>
            <div id="ahir" style="display:block">
              <table border="0" class="list">
                <tr>
                  <td valign="middle" width="50px" align="center">
                    <font size="+3" color="#FFFFFF">< </font>
                  </td>
                  <td class="hidden-xs">
                    <font size="-1" color="#FFFFFF">DAFTAR<br>SOAL</font>
                  </td>
                </tr>
              </table>
            </div>
          </a>

      <script src="<?=base_url('assets/js/masonry.pkgd.min.js')?>"></script>
            <script type="text/javascript">
              function AlertIt() {
              $("#awal").css("display", "block");
              $("#ahir").css("display", "none");
              if($("#slideMenu").hasClass('closed')){
                      $("#slideMenu").animate({right:0}, 200, function(){
                        $(this).removeClass('closed').addClass('opened');
                        document.getElementById("kakisoal").style.width = '74%';
                        $("a#toggleLink").removeClass('toggleBtn').addClass('toggleBtnHighlight');
                      });
              $("#awal").css("display", "block");
              $("#ahir").css("display", "none");
              //e.preventDefault();
                  //return false;
              }//if close
              if($("#slideMenu").hasClass('opened')){

              if ( $(window).width() > 739) {
                $("#slideMenu").animate({right:-400}, 200, function(){// jika screen kecil gunakan right:-240, untuk lebar right:-400
                  $(this).removeClass('opened').addClass('closed');
                  document.getElementById("kakisoal").style.width = '97.7%';
                  $("a#toggleLink").removeClass('toggleBtnHighlight').addClass('toggleBtn');
                });
              } else if ( $(window).width() > 409) {
                $("#slideMenu").animate({right:-400}, 200, function(){// jika screen kecil gunakan right:-240, untuk lebar right:-400
                  $(this).removeClass('opened').addClass('closed');
                  document.getElementById("kakisoal").style.width = '97.7%';
                  $("a#toggleLink").removeClass('toggleBtnHighlight').addClass('toggleBtn');
                });

              } else {
                $("#slideMenu").animate({right:-440}, 200, function(){// jika screen kecil gunakan right:-240, untuk lebar right:-400
                  $(this).removeClass('opened').addClass('closed');
                  document.getElementById("kakisoal").style.width = '92%';
                  $("a#toggleLink").removeClass('toggleBtnHighlight').addClass('toggleBtn');
                });
            }



            $("#awal").css("display", "none");
            $("#ahir").css("display", "block");
            //e.preventDefault();
                  }//if close
            }
          </script>


<div class="kakisoal" id="kakisoal">
  <section class="soal-navigation">
    <div class="container1">
    <div class="col-md-5">
      <button id="btnPrevSoal" class="btn btn-default btn-prev" onclick="return question($('#no'+(parseInt(document.getElementById('soal').textContent)-1)).val(), parseInt(document.getElementById('soal').textContent)-1)">SOAL SEBELUMNYA</button>
    </div>
    <div class="col-md-3">
      <label  class="labele" id="randomKey">
       <input type="checkbox" id="uncertain" onclick="uncertain($('#QuestionID').val())">&nbsp;RAGU-RAGU
       <script></script>
      </label>
    </div>
    <div class="col-md-4">
      <button id="btnNextSoal" class="btn btn-primary btn-next activebutton" onclick="return question($('#no'+(parseInt(document.getElementById('soal').textContent)+1)).val(), parseInt(document.getElementById('soal').textContent)+1)">SOAL BERIKUTNYA</button>
    </div>
    <div class="col-md-4">
      <button id="btnFinish" class="btn btn-danger btn-next" onclick="return confirm('Apakah anda sudah  yakin?')">SELESAI</button>
    </div>
 </section> 
</div>


<!-- Modal -->
<div class="modal fade" id="modal-form" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title page-label">Konfirmasi Tes</h1>
                </div>
                <div class="panel-body">
                    <div class="inner-content">
                        <div class="wysiwyg-content">
                            <p>
                                Terimakasih telah berpartisipasi dalam tes ini.<br>
                                Silahkan klik tombol LOGOUT untuk mengakhiri test.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row" style="background-color:#fff">
                        <div class="col-xs-offset-3 col-xs-6">
                            <button type="submit" class="btn btn-success" data-dismiss="modal">SELESAI</button>
                            <button type="submit" class="btn btn-danger" data-dismiss="modal">TIDAK</button>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

