  <div class="form-group">
                                                    <div class="row">
                                                        <strong><font color="red">Download Course Materials</font></strong>

                                                          @foreach($entries as $entry)
                                                             <div class=ol-md-2"c">

                                                                   <p>{{$entry->filename}}</p>
                                                              <div class="caption">

                                                                  <a href={{route('getentry', $entry->original_filename )}} <i class="icon-download-alt"> </i>download </a>
                                                        </div>
                                                  </div>

                                          @endforeach



</div>
</div>

