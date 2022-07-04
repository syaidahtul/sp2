<div {{ $attributes->merge(['class'=>'min-w-full overflow-hidden overflow-x-auto shadow']) }}>
    
    <table class="min-w-full divide-y divide-gray-200">
    
        <thead>
            <tr>
                {{ $head }}
            </tr>
        </thead>

        <tbody class="bg-white divide-y divide-gray-200">
            {{  $body  }}
        </tbody>
    
    </table>
    
</div>