<div class="col-md-12">
	<section id="no-more-tables">
			<h6>Data GAP</h6>
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
									<?php
									$id = $k->kriteria_id;
									$nilai_filter = get_nilai_sub_kriteria($request->$id);
									$nilai_profile = $k->sub_kriteria->nilai;
									?>
									<td class="th-font" data-title="{{ $k->kriteria->nama }}">{{ get_nilai_gap($nilai_filter,$nilai_profile) }}</td>
								@endforeach
							</tr>
						@endforeach
					</tbody>
			</table>
	</section>
</div>