<div id="delete-header-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-danger">
                <h4 class="modal-title" id="danger-header-modalLabel">{{ __('Confirm Delete') }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>{{ __('Delete Product') }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">{{ __('Close') }}</button>
                <button type="button" class="btn btn-danger" id="deleteButton">{{ __('Delete') }}</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
