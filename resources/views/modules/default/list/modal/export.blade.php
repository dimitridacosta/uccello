<div id="exportModal" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h5>
            <i class="material-icons left primary-text">cloud_download</i>
            {{ uctrans('modal.export.title', $module) }}
        </h5>

        <p>{{ uctrans('modal.export.description', $module) }}</p>

        <div class="row">
            <div class="col s12">
                <div class="input-field">
                    <select id="export_format">
                        @section('export-formats')
                            <option value="xlsx">{{ uctrans('modal.export.format.xlsx', $module) }}</option>
                            <option value="xls">{{ uctrans('modal.export.format.xls', $module) }}</option>
                            <option value="ods">{{ uctrans('modal.export.format.ods', $module) }}</option>
                            <option value="csv">{{ uctrans('modal.export.format.csv', $module) }}</option>
                            <option value="html">{{ uctrans('modal.export.format.html', $module) }}</option>
                        @show

                        @yield('extra-export-formats')
                    </select>
                    <label>{{ uctrans('modal.export.format_label', $module) }}</label>
                </div>

                <p>
                    <label>
                        <input type="checkbox" id="export_keep_conditions" checked />
                        <span>{{ uctrans('modal.export.keep_conditions', $module) }}</span>
                    </label>
                </p>

                <p>
                    <label>
                        <input type="checkbox" id="export_keep_order" checked />
                        <span>{{ uctrans('modal.export.keep_sort', $module) }}</span>
                    </label>
                </p>

                <p>
                    <label>
                        <input type="checkbox" id="export_with_id" checked />
                        <span>{{ uctrans('modal.export.with_id', $module) }}</span>
                    </label>
                </p>

                <p>
                    <label>
                        <input type="checkbox" id="with_hidden_columns" />
                        <span>{{ uctrans('modal.export.with_hidden_columns', $module) }}</span>
                    </label>
                </p>

                <p>
                    <label>
                        <input type="checkbox" id="export_with_timestamps" />
                        <span>{{ uctrans('modal.export.with_timestamps', $module) }}</span>
                    </label>
                </p>

                @yield('extra-export-options')

                <input type="hidden" id="export_with_descendants" @if ($seeDescendants) value="1" @else value="0" @endif />
            </div>

            @yield('extra-export-modal-content')
        </div>
    </div>

    @section('export-modal-footer')
    <div class="modal-footer">
        @yield('before-cancel-export-button')

        {{-- Cancel button --}}
        <a href="javascript:void(0)" class="btn-flat waves-effect modal-close">{{ uctrans('button.cancel', $module) }}</a>

        @yield('before-export-button')

        {{-- Export button --}}
        <a href="javascript:void(0)" class="btn-flat waves-effect modal-close green-text export">{{ uctrans('button.export', $module) }}</a>

        @yield('after-export-button')
    </div>
    @show
</div>
