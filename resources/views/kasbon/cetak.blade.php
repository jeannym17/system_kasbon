<body onload="window.print()">
    

<table id="datatable2" class="table dt-responsive nowrap" >
    <thead>
    <tr>
        <th>No Kasbon</th>
        <th>Tanggal Masuk</th>
        <th>Kasbon</th>
        <th>Nominal Kasbon</th>
        <th>No Invoice</th>
        <th>Jenis</th>
        <th>Status</th>
        <th style="width:0%">Action</th>
        <th  style="text-align: center">Pemberitahuan</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($kasbon as $kasbons)
     
        <td>{{$kasbons->nokasbon}}</td>
        <td>{{$kasbons->tglmasuk->format('d/m/Y')}}</td>
        <td>{{$kasbons->jeniskasbon}}</td>
        <td>{{$kasbon->kurs->symbol}} {{number_format($kasbons->total)}}</td>
        <td>{{$kasbons->noinvoice}}</td>
        <td>{{$kasbons->jenis->name}}</td>      
    </tr>
 
    @endforeach
    </tbody>
   
</table>
</body>