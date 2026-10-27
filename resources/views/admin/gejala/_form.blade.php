@if ($errors->any())
    <div class="rounded-xl border border-danger/20 bg-danger/5 px-4 py-3 text-sm text-danger">
        <ul class="list-inside list-disc space-y-0.5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div>
    <label class="field-label">Kode Gejala</label>
    <input type="text" name="kode_gejala" class="field-input" placeholder="Contoh: G017"
           value="{{ old('kode_gejala', $gejala->kode_gejala ?? '') }}" required>
</div>
<div>
    <label class="field-label">Nama Gejala</label>
    <textarea name="nama_gejala" rows="2" class="field-input" required>{{ old('nama_gejala', $gejala->nama_gejala ?? '') }}</textarea>
</div>
<div>
    <label class="field-label">Nilai CF Pakar (0.0 &ndash; 1.0)</label>
    <input type="number" step="0.1" min="0" max="1" name="nilai_cf_pakar" class="field-input"
           value="{{ old('nilai_cf_pakar', $gejala->aturan->nilai_cf_pakar ?? '') }}" required>
    <p class="mt-1.5 text-xs text-slate">Bobot kepakaran/rule CF untuk gejala ini, dipakai pada rumus CF(H,E) = CF Pakar &times; CF User.</p>
</div>
