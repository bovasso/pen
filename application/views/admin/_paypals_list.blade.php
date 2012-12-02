@foreach ($students as $student)
    <tr>
       <td>{{$student->classroom->name}}</td><td><small>({{$student->gender}})</small>&nbsp;{{$student->full_name}}</td>
       <td><i class="icon-resize-horizontal"></i></td>
       
       @foreach ( $student->penpals_by_classroom as $penpal)                             
       <td>{{$penpal->student->classroom->name}}</td>
       <td>
            <small>({{$penpal->student->gender}})</small>&nbsp;{{$penpal->student->full_name}}
       </td>                     
       @endforeach
    </tr>
@endforeach              
