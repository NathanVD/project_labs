<div class="services-section spad">
  <div class="container">
    <div class="section-title dark">
      @if (!$services_title)
        <h2>Get in <span>the Lab</span> and see the services</h2>
      @else
        @if ($services_title->highlight)
          <h2>{{$services_title->title_1}} <span>{{$services_title->highlight}}</span> {{$services_title->title_2}}</h2>
        @else
          <h2>{{$services_title->title_1}} {{$services_title->title_2}}</h2>
        @endif
      @endif
    </div>
      @if (!$services_chunks || $services_chunks->isEmpty())
        <div class="row">
          <!-- single service -->
          <div class="col-md-4 col-sm-6">
            <div class="service">
              <div class="icon">
                <i class="flaticon-023-flask"></i>
              </div>
              <div class="service-text">
                <h2>Get in the lab</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..</p>
              </div>
            </div>
          </div>
          <!-- single service -->
          <div class="col-md-4 col-sm-6">
            <div class="service">
              <div class="icon">
                <i class="flaticon-011-compass"></i>
              </div>
              <div class="service-text">
                <h2>Projects online</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..</p>
              </div>
            </div>
          </div>
          <!-- single service -->
          <div class="col-md-4 col-sm-6">
            <div class="service">
              <div class="icon">
                <i class="flaticon-037-idea"></i>
              </div>
              <div class="service-text">
                <h2>SMART MARKETING</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..</p>
              </div>
            </div>
          </div>
          <!-- single service -->
          <div class="col-md-4 col-sm-6">
            <div class="service">
              <div class="icon">
                <i class="flaticon-039-vector"></i>
              </div>
              <div class="service-text">
                <h2>Social Media</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..</p>
              </div>
            </div>
          </div>
          <!-- single service -->
          <div class="col-md-4 col-sm-6">
            <div class="service">
              <div class="icon">
                <i class="flaticon-036-brainstorming"></i>
              </div>
              <div class="service-text">
                <h2>Brainstorming</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..</p>
              </div>
            </div>
          </div>
          <!-- single service -->
          <div class="col-md-4 col-sm-6">
            <div class="service">
              <div class="icon">
                <i class="flaticon-026-search"></i>
              </div>
              <div class="service-text">
                <h2>Documented</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..</p>
              </div>
            </div>
          </div>
          <!-- single service -->
          <div class="col-md-4 col-sm-6">
            <div class="service">
              <div class="icon">
                <i class="flaticon-018-laptop-1"></i>
              </div>
              <div class="service-text">
                <h2>Responsive</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..</p>
              </div>
            </div>
          </div>
          <!-- single service -->
          <div class="col-md-4 col-sm-6">
            <div class="service">
              <div class="icon">
                <i class="flaticon-043-sketch"></i>
              </div>
              <div class="service-text">
                <h2>Retina ready</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..</p>
              </div>
            </div>
          </div>
          <!-- single service -->
          <div class="col-md-4 col-sm-6">
            <div class="service">
              <div class="icon">
                <i class="flaticon-012-cube"></i>
              </div>
              <div class="service-text">
                <h2>Ultra modern</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..</p>
              </div>
            </div>
          </div>
        </div>
      @else
        <div class="tab-content" id="pills-tabContent">
          @foreach ($services_chunks as $services_row)
            <div class="tab-pane {{$loop->first ? 'active' : ''}}" id="pills-{{$loop->index}}" role="tabpanel" aria-labelledby="pills-{{$loop->index}}-tab">
              @foreach ($services_row->chunk(3) as $services)
                <div class="row d-flex justify-content-center">
                  @foreach ($services as $service)
                    <div class="col-md-4 col-sm-6">
                      <div class="service">
                        <div class="row">
                          <div class="col-md-2">
                            <div class="icon">
                              <i class="{{$service->icon}}"></i>
                            </div>                            
                          </div>
                          <div class="col-md-10">
                            <div class="service-text">
                              <h2>{{$service->title}}</h2>
                              <p>{{$service->description}}</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
              @endforeach
            </div>
          @endforeach
        </div>
        @if ($services_chunks->count() > 1)
          <ul class="nav nav-pills mb-3 d-flex justify-content-center mb-3" id="pills-tab" role="tablist">
            @foreach($services_chunks as $services)
              <li class="nav-item{{$loop->first ? ' active' : ''}}"">
                <a class="nav-link{{$loop->first ? ' active' : ''}}" id="pills-{{$loop->index}}-tab" data-toggle="pill" href="#pills-{{$loop->index}}" role="tab" aria-controls="pills-{{$loop->index}}" aria-selected="{{$loop->first ? 'true' : 'false'}}">{{$loop->index}}</a>
              </li>
            @endforeach
          </ul>
        @endif
      @endif
    <div class="text-center">
      <a href="/services#primed_services" class="site-btn">Browse</a>
    </div>
  </div>
</div>

