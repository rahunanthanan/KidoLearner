@extends('layouts.app')
@section('content')


    <div class="col-md-2 col-md-offset-0" style="background-color:  #004280; color: white">


        @include('layouts.parentSidenavbar')


    </div>

                    <section class="content">
                                  <div class="row" align="center">
                                    <div class="col-md-6">
                                      <div class="box">
                                        <div class="box-header with-border">

                                        </div><!-- /.box-header -->
                                        <div class="box-body">
                                          <table class="table table-bordered" id="table_ID">
                                                     <thead>
                                                                  <tr>


                                                                              <th class="col-sm-2">Quiz</th>
                                                                              <th class="col-sm-2">Subject</th>
                                                                              <th class="col-sm-2">Duration</th>
                                                                              

                                                                              



                                                                  </tr>
                                                     </thead>
                                                     <tbody>


                                                                  <tr>


                                                                      @foreach($quizpaper as $quiz)

                                                                                 <td class="col-sm-2">

                                                                                   {{$quiz->quizID}}
                                                                                 
                                                                                  </td>
                                                                                  
                                                                                  <td class="col-sm-2">{{$quiz->subject}}</td>
                                                                                  <td class="col-sm-2">{{$quiz->duration}}</td>
                                                                                  

                                                                         {!!  Form::open(array('url'=>'createquiz')) !!}

                                                                               <div id="view{{$quiz->quizID}}" class="modal fade" role="dialog">
                                                                                  <div class="modal-dialog"  style="width:100%;height:100%">

                                                                                <!-- Modal content-->
                                                                                   <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                                                                    <h4 class="modal-title custom_align" id="Heading"><strong><font color="green">QUIZ {{$quiz->quizID}}</font></strong></h4>

                                                                                    </div>

                                                                                   <div class="modal-body" style="background-image: url(http://thumbs.dreamstime.com/z/framing-misc-usage-people-different-age-small-teenage-children-29086404.jpg);">

                                                                                   <fieldset>



                                                                                   <h1><font color="purple">Welcome TO quiz!!!!</font> </h1>
                                                                                   <h1 align="center"><font color="#ff1493" >Let's Start Your QUIZ</font></h1>


                                                                                   
                                                                                   <h1 align="center">Subject : {{$quiz->subject}}</h1>

                                                                                   

                                                                                    @foreach($question as $que)

                                                                                 

                                                                                        {{$que->queID}}<br>
                                                                                        {{$que->question}}<br>

                                                                                   
                                                                                    @endforeach








                                                                                     </fieldset>

                                                                               </div>


                                                                          </div>
                                                                         </div>




                                                                      {!!  Form::close() !!}

                                                                 </div>


                                                          </tr>

                                                    @endforeach


                                                     </tbody>


                                             </table>

                                            </div>
                                           </div>
                                          </div>
                                         </div>
                                        </section>



  

             <script src="js/jquery.min.js"></script>
             <script src="js/bootstrap.min.js"></script>
             <script src="js/scripts.js"></script>



             <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
             <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
             <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.8/js/jquery.dataTables.js"></script>
             <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>


               {{-- data table--}}
                  <script>
                    $(document).ready( function () {
                         $('#table_ID').DataTable().columnFilter()(
                          {
                             "lengthMenu": [[2, 4, 6, -1], [2, 4, 6, "All"]]


                          } );

                       });
                  </script>






@stop