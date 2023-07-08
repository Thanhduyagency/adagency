

<?php if(!isset($_SESSION['thongbaonoi'])) { $_SESSION['thongbaonoi'] = True;?>
<!-- Modal -->
<div class="modal fade" id="thongbaonoi" role="dialog" style="display: none;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">THÔNG BÁO</h5>
            </div>
            <div class="modal-body">
                <?=$CMSNT->site('thongbao');?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    setTimeout(e => {
        showlog()
    }, 1000)
});

function showlog() {
    $('#thongbaonoi').modal({
        backdrop: 'static',
        keyboard: true,
        show: true
    });
}
</script>
<?php }?>
<script type="text/javascript">
    $(document).ready(function() {
        setTimeout(e => {
            loadCron()
        }, 1000)
    });
    function loadCron() {
        $.get("<?=BASE_URL("api/momo_mail.php");?>");
    }
</script>

<!-- Jquery Core Js -->
<script src="<?=BASE_URL('template');?>/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="<?=BASE_URL('template');?>/plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="<?=BASE_URL('template');?>/plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="<?=BASE_URL('template');?>/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="<?=BASE_URL('template');?>/plugins/node-waves/waves.js"></script>

<!-- Jquery DataTable Plugin Js -->
<script src="<?=BASE_URL('template');?>/plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="<?=BASE_URL('template');?>/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js">
</script>
<script src="<?=BASE_URL('template');?>/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js">
</script>
<script src="<?=BASE_URL('template');?>/plugins/jquery-datatable/extensions/export/buttons.flash.min.js">
</script>
<script src="<?=BASE_URL('template');?>/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="<?=BASE_URL('template');?>/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="<?=BASE_URL('template');?>/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="<?=BASE_URL('template');?>/plugins/jquery-datatable/extensions/export/buttons.html5.min.js">
</script>
<script src="<?=BASE_URL('template');?>/plugins/jquery-datatable/extensions/export/buttons.print.min.js">
</script>

<!-- Custom Js -->
<script src="<?=BASE_URL('template');?>/js/admin.js"></script>
<script src="<?=BASE_URL('template');?>/js/pages/tables/jquery-datatable.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.6/clipboard.min.js"></script>
<script>
new ClipboardJS('.copy');
</script>
</body>

</html>