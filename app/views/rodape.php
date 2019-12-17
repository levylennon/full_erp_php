  <!-- js placed at the end of the document so the pages load faster -->
  <script src= "<?php echo URL_BASE . "assets/new/lib/jquery/jquery.min.js"?>" ></script>

  <script src= "<?php echo URL_BASE . "assets/new/lib/bootstrap/js/bootstrap.min.js"?>" ></script>
  <script class="include" type="text/javascript" src= "<?php echo URL_BASE . "assets/new/lib/jquery.dcjqaccordion.2.7.js"?>" ></script>
  <script src= "<?php echo URL_BASE . "assets/new/lib/jquery.scrollTo.min.js"?>" ></script>
  <script src= "<?php echo URL_BASE . "assets/new/lib/jquery.nicescroll.js"?>"  type="text/javascript"></script>
  <script src= "<?php echo URL_BASE . "assets/new/lib/jquery.sparkline.js"?>" ></script>
  <!--common script for all pages-->
  <script src= "<?php echo URL_BASE . "assets/new/lib/common-scripts.js"?>" ></script>
  <script type="text/javascript" src= "<?php echo URL_BASE . "assets/new/lib/gritter/js/jquery.gritter.js"?>" ></script>
  <script type="text/javascript" src= "<?php echo URL_BASE . "assets/new/lib/gritter-conf.js"?>" ></script>
  <!-- ########################## Grafico vendas################################-->
  <script src= "<?php echo URL_BASE . "assets/new/lib/sparkline-chart.js"?>" ></script>
  <!-- ########################## Grafico calendario ################################-->
  <script src= "<?php echo URL_BASE . "assets/new/lib/zabuto_calendar.js"?>" ></script>

  <script type="text/javascript">

  // Notificação de boas vindas
    // $(document).ready(function() {
    //   var unique_id = $.gritter.add({
    //     // (string | mandatory) the heading of the notification
    //     title: 'Seja Bem Vindo',
    //     // (string | mandatory) the text inside the notification
    //     text: 'Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo.',
    //     // (string | optional) the image to display on the left
    //     image: '?php echo URL_BASE . "assets/new/img/ui-sam.jpg"?>',
    //     // (bool | optional) if you want it to fade out on its own or just sit there
    //     sticky: false,
    //     // (int | optional) the time you want it to be alive for before fading out
    //     time: 8000,
    //     // (string | optional) the class name you want to apply to that specific message
    //     class_name: 'my-sticky-class'
    //   });

    //   return false;
    // });

    // Fim Notificação Boas Vindas
  </script>
  <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>

  <!-- DataTable  -->
  <!-- <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
  <script type="text/javascript" language="javascript" src="<?php echo URL_BASE . "assets/new/lib/jquery.dataTables.min.js"?>">
    </script>
<!-- Chamo a função para carregar os dados na table -->
<script>
    $(document).ready(function () {
      $('#example').DataTable();
    });
  </script>