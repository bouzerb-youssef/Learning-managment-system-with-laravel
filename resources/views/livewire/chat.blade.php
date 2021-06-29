<div >
   
    <div class="page-content-inner">

        <div class="d-flex">
            <nav id="breadcrumbs" class="mb-3">
                <ul>
                    <li><a href="#"> <i class="uil-home-alt"></i> </a></li>
                    <li><a href="#"> Chat </a></li>
                    <li>All Message</li>
                </ul>
            </nav>
        </div>



        <div class="chats-container margin-top-0">

            <div class="chats-container-inner">

                <!-- chats -->
                <div class="chats-inbox">
                    <div class="chats-headline">
                        <div class="input-with-icon">
                            <input id="autocomplete-input" type="text" placeholder="Search">
                            <i class="icon-material-outline-search"></i>
                        </div>
                    </div>

                    <ul>
                        @forelse ($groups as $group)
                        <li>
                            <a  href="{{ route('chat.show', $group) }}" >
                                <div class="message-avatar"><i class="status-icon status-online"></i><img src="../assets/images/avatars/avatar-1.jpg" alt=""></div>

                                <div class="message-by">
                                    <div class="message-by-headline">
                                        <h5>{{$group->title}} </h5>
                                        <span>{{$group->students->count()}}</span>
                                    </div>
{{--                                     <p>You: Yes, in an organization stature, this is a must</p>
 --}}                                    <span class="message-readed uil-check"> </span>
                                </div>
                            </a>
                        </li> 
                        @empty
                        <h5>ليس هناك مجموعات </h5>

                        @endforelse
                        

                      {{--   <li class="active-message">
                            <a href="#">
                                <div class="message-avatar"><i class="status-icon status-online"></i><img src="../assets/images/avatars/avatar-2.jpg" alt=""></div>

                                <div class="message-by">
                                    <div class="message-by-headline">
                                        <h5>Stella Johnson </h5>
                                        <span>Yesterday</span>
                                    </div>
                                    <p>What are you doing?</p>
                                </div>
                            </a>
                        </li>
 --}}
                    

                    </ul>
                </div>
                <!-- chats / End -->

                <!-- Message Content -->
                <div class="message-content">

                    <div class="chats-headline">

                        <div class="d-flex">
                            <div class="avatar-parent-child">
                                <img alt="Image placeholder" src="../assets/images/avatars/avatar-1.jpg" class="avatar  rounded-circle avatar-sm">
                                <span class="avatar-child avatar-badge bg-success"></span>
                            </div>
                            <h4 class="mr-2"> Alex Dolgove <span>Online</span> </h4>
                        </div>

                        <div class="message-action">
                            <a href="#" class="btn btn-icon btn-hover  btn-circle" uk-tooltip="filter" title="" aria-expanded="false">
                                <i class="uil-outgoing-call"></i>
                            </a>
                            <a href="#" class="btn btn-icon btn-hover  btn-circle" uk-tooltip="filter" title="" aria-expanded="false">
                                <i class="uil-video"></i>
                            </a>
                            <a href="#" class="btn btn-icon btn-hover  btn-circle" uk-tooltip="More" title="" aria-expanded="false">
                                <i class="uil-ellipsis-h"></i>
                            </a>
                            <div uk-dropdown="pos: left ; mode: click ;animation: uk-animation-slide-bottom-small" class="uk-dropdown">
                                <ul class="uk-nav uk-dropdown-nav">
                                    <li><a href="#"> Refresh </a></li>
                                    <li><a href="#"> Manage</a></li>
                                    <li><a href="#"> Setting</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>

                    <!-- Message Content Inner -->
                 
                     
                   @livewire('chat.text-message', ['group' => $group])
                 
                    <!-- Message Content Inner / End -->

                    <!-- Reply Area -->
                 

                    <!-- 
                <div class="message-reply">
                    <textarea cols="1" rows="1" placeholder="Your Message" data-autoresize></textarea>
                    <button class="btn btn-primary ripple-effect">Send</button>
                </div>-->



                </div>
                <!-- Message Content -->

            </div>
        </div>
        <!-- chats Container / End -->

    </div>
</div>