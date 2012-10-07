@foreach ($students as $student)
    <tr>
       <td>{{$student->classroom->name}}</td><td>{{$student->full_name}} - {{$student->email}}</td>
       <td><i class="icon-resize-horizontal"></i></td>
       
       @foreach ( $student->penpals_by_classroom as $penpal)                             
       <td>{{$penpal->student->classroom->name}}</td>
       <td>
           {{$penpal->student->full_name}} - {{$penpal->student->email}}
       </td>                     
       @endforeach
    </tr>
@endforeach              
