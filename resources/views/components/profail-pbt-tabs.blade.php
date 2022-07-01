<div x-data="{ openTab: 2, 
    activeClasses: 'bg-sky-100 border rounded-t-lg text-emerald-700 font-bold uppercase',
    inactiveClasses: 'hover:text-emerald-800' }" 
class="flex flex-wrap border-gray-200 ">

<ul class="flex items-center w-full border rounded-t-lg bg-gray-50 sm:justify-items-start">
    
    <li :class="{ '-mb-px': openTab === 1 }" class="px-3 py-3 mr-1 -mb-px">
        <a 
            href="#"
            aria-current="page" class="inline-block px-4 py-3 rounded-lg active hover:font-bold focus:font-bold">
            Profail
        </a>
    </li>
    <li :class="{ '-mb-px': openTab === 2 }" class="px-3 py-3 mr-1">
        <a  href="#" 
            class="inline-block px-4 py-3 rounded-lg active hover:font-bold focus:font-bold">
            Lokasi
        </a>
    </li>
    <li :class="{ '-mb-px': openTab === 3 }" class="px-3 py-3 mr-1">
        <a 
            href="#"
            class="inline-block px-4 py-3 rounded-lg active hover:font-bold focus:font-bold">
            Tapak Pelupusan Sampah
        </a>
    </li>
    <li :class="{ '-mb-px': openTab === 4 }" class="px-3 py-3 mr-1">
        <a 
            href="#"
            class="inline-block px-4 py-3 rounded-lg active hover:font-bold focus:font-bold">
            Jentera
        </a>
    </li>
    <li :class="{ '-mb-px': openTab === 5 }" class="px-3 py-3 mr-1">
        <a 
            href="#"
            class="inline-block px-4 py-3 rounded-lg active hover:font-bold focus:font-bold">
            Kontraktor
        </a>
    </li>
    <li :class="{ '-mb-px': openTab === 'pengguna' }" class="px-3 py-3 mr-1">
        <a 
            href="#"
            class="inline-block px-4 py-3 rounded-lg active hover:font-bold focus:font-bold">
            Pengguna
        </a>
    </li>
</ul>

</div>