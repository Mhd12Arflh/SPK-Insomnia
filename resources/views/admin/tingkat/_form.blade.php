@if ($errors->any())
    <div class="rounded-xl border border-danger/20 bg-danger/5 px-4 py-3 text-sm text-danger">
        <ul class="list-inside list-disc space-y-0.5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
    <div>
        <label class="field-label">Kode</label>
        <input type="text" name="kode" class="field-input" placeholder="P01" value="{{ old('kode', $tingkat->kode ?? '') }}" required>
    </div>
    <div>
        <label class="field-label">Nama Tingkat</label>
        <input type="text" name="nama" class="field-input" placeholder="Ringan" value="{{ old('nama', $tingkat->nama ?? '') }}" required>
    </div>
    <div>
        <label class="field-label">Nilai CF Min</label>
        <input type="number" step="0.01" min="0" max="1" name="nilai_min" class="field-input" value="{{ old('nilai_min', $tingkat->nilai_min ?? '') }}" required>
    </div>
    <div>
        <label class="field-label">Nilai CF Max</label>
        <input type="number" step="0.01" min="0" max="1" name="nilai_max" class="field-input" value="{{ old('nilai_max', $tingkat->nilai_max ?? '') }}" required>
    </div>
    <div>
        <label class="field-label">Persentase Min (%)</label>
        <input type="number" step="0.01" min="0" max="100" name="persentase_min" class="field-input" value="{{ old('persentase_min', $tingkat->persentase_min ?? '') }}" required>
    </div>
    <div>
        <label class="field-label">Persentase Max (%)</label>
        <input type="number" step="0.01" min="0" max="100" name="persentase_max" class="field-input" value="{{ old('persentase_max', $tingkat->persentase_max ?? '') }}" required>
    </div>
</div>
<div>
    <label class="field-label">Saran / Rekomendasi</label>
    <textarea name="saran" rows="3" class="field-input">{{ old('saran', $tingkat->saran ?? '') }}</textarea>
</div>
