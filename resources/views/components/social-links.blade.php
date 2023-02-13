<ul class="footer-social">

    @if( $sitt->facebook != null)
    <li><a href="{{$sitt->facebook}}" target="_blank"  class="facebook"><i class="fa fa-facebook"></i></a></li>
    @endif

    @if( $sitt->twitter != null)
    <li><a href="{{$sitt->twitter}}" target="_blank" class="twitter"><i class="fa fa-twitter"></i></a></li>
    @endif

    @if( $sitt->instaram != null)
    <li><a href="{{$sitt->instaram}}" target="_blank" class="instagram"><i class="fa fa-instagram"></i></a></li>
    @endif

    @if( $sitt->youtube != null)
    <li><a href="{{$sitt->youtube}}" target="_blank" class="youtube"><i class="fa fa-youtube"></i></a></li>
    @endif

    @if( $sitt->linkedin != null)
    <li><a href="{{$sitt->linkedin}}" target="_blank" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
    @endif
</ul>