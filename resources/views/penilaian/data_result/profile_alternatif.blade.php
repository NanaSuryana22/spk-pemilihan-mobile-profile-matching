<div class="col-md-12">
	<section id="no-more-tables">
			<h6>Data Nilai Profile Alternatif</h6>
			<hr />
			<table class="table table-bordered table-striped table-condensed cf" width="500px">
					<thead class="cf">
						<tr>
							<th class="th-font">Nama Alternatif</th>
							@foreach ($kriteria as $k)
								<th class="th-font">{{ $k->nama }}</th>
							@endforeach
						</tr>
					</thead>
					<tbody>
						@foreach($mobil as $m)
							<tr>
								<td class="th-font" data-title="Nama Alternatif">{{ $m->nama }}</td>
								@foreach ($m->opt_alternatifs->sortBy('kriteria_id') as $k)
									<td class="th-font" data-title="{{ $k->kriteria->nama }}">{{ $k->sub_kriteria->nilai }}</td>
								@endforeach
							</tr>
						@endforeach
					</tbody>
			</table>
	</section>
</div>