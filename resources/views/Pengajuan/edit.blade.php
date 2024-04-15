<div class="flex flex-row gap-10">
    <div class="flex flex-row items-center justify-center gap-6">
        <div class="flex flex-col items-center justify-center">
            <label for="Rejected" class="block mb-2 text-sm font-medium text-gray-900">Tertolak</label>
            <input type="checkbox" name="status_validasi" id="Rejected" value='3' onclick="if(this.checked) {Validated.checked=false;} {Process.checked=false;}" class="bg-gray-50 border border-gray-500 text-gray-900 sm:text-sm rounded-lg focus:ring-[#F5682A] focus:border-[#F5682A] block p-2.5">
        </div>
        <div class="flex flex-col items-center justify-center">
            <label for="Validated" class="block mb-2 text-sm font-medium text-gray-900">Tervalidasi</label>
            <input type="checkbox" name="status_validasi" id="Validated" value='2' onclick="if(this.checked) {Process.checked=false;} {Rejected.checked=false;}" class="bg-gray-50 border border-gray-500 text-gray-900 sm:text-sm rounded-lg focus:ring-[#F5682A] focus:border-[#F5682A] block p-2.5">
        </div>
        <div class="flex flex-col items-center justify-center">
            <label for="Process" class="block mb-2 text-sm font-medium text-gray-900"> Sedang Diproses</label>
            <input type="checkbox" name="status_validasi" id="Process" value='1' onclick="if(this.checked) {Validated.checked=false;} {Rejected.checked=false;}" class="bg-gray-50 border border-gray-500 text-gray-900 sm:text-sm rounded-lg focus:ring-[#F5682A] focus:border-[#F5682A] block p-2.5">
        </div>
    </div>
</div>