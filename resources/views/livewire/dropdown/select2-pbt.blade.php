<div>

    <div wire:ignore>
        <select class="form-control" id="select2-dropdown" name="kod_pbt">
            <option value="">Select Option</option>
            @foreach($pbts as $item)
                <option value="{{ $item->kod }}">{{ $item->nama_pbt }}</option>
            @endforeach
        </select>
    </div>

</div>

@push('scripts')

<script>
    $(document).ready(function () {
        $('#select2-dropdown').select2();
        $("#myBox").select2({ containerCssClass : "block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" });
        $('#select2-dropdown').on('change', function (e) {
            var data = $('#select2-dropdown').select2("val");
            @this.set('selectedPbt', data);
        });
    });
</script>

@endpush
