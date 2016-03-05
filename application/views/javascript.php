<script src="<?php echo base_url('media/js/jquery.nestable.js');?>"></script>
<script>

$.extend($.expr[':'], {
  'containsi': function(elem, i, match, array)
  {
    return (elem.textContent || elem.innerText || '').toLowerCase()
    .indexOf((match[3] || "").toLowerCase()) >= 0;
  }
});

$(document).ready(function()
{
    $( ".sortable" ).sortable({cursor: 'move', update: function() {
            var order = $(this).sortable("serialize");
            $('#sortable-output').val(order);
        }
    });
    $( ".sortable" ).disableSelection();

    // confirmation
    $('a.confirm-del, a.btn-confirm').click(function(e) {
        var url = $(this).attr('href');
        $( "#dialog-confirm" ).dialog({
          resizable: false,
          height:200,
          modal: true,
          buttons: {
            "Ya": function() {
              window.location = url;
            },
            "Tidak": function() {
              $( this ).dialog( "close" );
            }
          }
        });
        e.preventDefault();
    });

    <?php if($this->router->fetch_method() == 'tree'):?>
    var updateOutput = function(e)
    {
        var list   = e.length ? e : $(e.target),
            output = list.data('output');
        if (window.JSON) {
            output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
        } else {
            output.val('JSON browser support required for this demo.');
        }
    };

    // activate Nestable for list 1
    $('#nestable').nestable({
        group: 1
    })
    .on('change', updateOutput);

    // output initial serialised data
    updateOutput($('#nestable').data('output', $('#nestable-output')));

    function friendly_url(str,max) {
      if (max === undefined) max = 32;
      var a_chars = new Array(
        new Array("a",/[áàâãªÁÀÂÃ]/g),
        new Array("e",/[éèêÉÈÊ]/g),
        new Array("i",/[íìîÍÌÎ]/g),
        new Array("o",/[òóôõºÓÒÔÕ]/g),
        new Array("u",/[úùûÚÙÛ]/g),
        new Array("c",/[çÇ]/g),
        new Array("n",/[Ññ]/g)
      );
      // Replace vowel with accent without them
      for(var i=0;i<a_chars.length;i++)
        str = str.replace(a_chars[i][1],a_chars[i][0]);
      // first replace whitespace by -, second remove repeated - by just one, third turn in low case the chars,
      // fourth delete all chars which are not between a-z or 0-9, fifth trim the string and
      // the last step truncate the string to 32 chars 
      return str.replace(/\s+/g,'-').toLowerCase().replace(/[^a-z0-9\-]/g, '').replace(/\-{2,}/g,'-').replace(/(^\s*)|(\s*$)/g, '').substr(0,max);
    }

    // Page tree selectbox onchange
    $('select#selectPage').change(function() {
        var pageText = $('select#selectPage :selected').text();
        $('input#jdl_menu').val(pageText);
        $('input#url_menu').val('page/' + $(this).val() + '/' + friendly_url(pageText));
    });
    <?php endif;?>

});
</script>