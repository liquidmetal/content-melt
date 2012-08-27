<h1>Edit Tutorial</h1>

<script src="/js/hallo.js"></script>
<script src="/js/rangy-core.js"></script>

<div class="post">
<?php echo $current_tutorial['Tutorial']['content']; ?>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('.post').hallo({plugins: {
                        'halloformat': {'formattings': {'bold': true, 'italic': true, 'strikeThrough': true, 'underline': true}}
                      }
                    });
})
</script>
