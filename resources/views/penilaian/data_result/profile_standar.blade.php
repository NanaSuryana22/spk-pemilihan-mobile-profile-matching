<?php
use Illuminate\Support\Facades\Auth;
?>
<div class="col-md-12">
    <section id="no-more-tables">
        <h6>Data Nilai Profile Standar</h6>
        <hr />
        <table class="table table-bordered table-striped table-condensed cf" width="500px">
            <thead class="cf">
                <tr>
                    <th class="th-font"></th>
                    @foreach ($kriteria as $k)
                        <th class="th-font">{{ $k->nama }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Nilai Profile Standar</td>
                    @foreach ($kriteria as $k)
                        <?php
                        $id = $k->id;
                        ?>
                        <td class="th-font" data-title="{{ $k->nama }}">
                            {{ get_nilai_sub_kriteria($request->$id) }}</td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </section>
</div>
