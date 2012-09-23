@foreach ($students as $student)
    <tr>
       <td>{{$student->classroom->name}}</td><td>{{$student->first_name}}</td>
       <td><i class="icon-resize-horizontal"></i></td>
       <td>
           <dl class="dl-horizontal">
               @foreach ( $student->penpals_by_classroom as $penpal)                             
               <dt>{{$penpal->student->classroom->name}}</dt><dd>{{$penpal->student->first_name}}</dd>
               @endforeach
           </dl>                             
       </td>                     
    </tr>
@endforeach              
