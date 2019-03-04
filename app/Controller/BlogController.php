<?php


namespace App\Controller;


use App\Core\Http\AbstractController;
use App\Core\Http\Request;
use App\Service\TestService;

/**
 * Class BlogController
 * @package App\Controller
 */
class BlogController extends AbstractController
{

    public function index()
    {
        return $this->render('index', ['test' => 'Hello World']);
    }

    public function post(Request $request)
    {
        return $this->render('post', [
            'title' => 'Lorem Ipsum',
            'id' => $request->parameter('post_id'),
            'date' => 'January 1, 2014',
            'author' => 'Florian',
            'content' => '
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In non scelerisque risus, eu sollicitudin sapien. Donec pellentesque pretium pharetra. Nulla ac risus quis dolor pulvinar fermentum et eu purus. Vivamus et scelerisque tortor. Suspendisse semper, nulla sit amet sodales tempor, diam leo ultricies ante, ut malesuada mi ante vitae ante. Maecenas pharetra, tortor non interdum pellentesque, ipsum eros ullamcorper eros, non convallis dolor ligula ac erat. Maecenas bibendum neque sed vestibulum accumsan. Nullam id sagittis massa. Vestibulum interdum diam sapien, ut efficitur neque vehicula nec. Quisque ut consectetur dui, in porttitor leo.</p>
                
                <p>Pellentesque nec mattis sem. Proin blandit eros risus, et condimentum eros convallis a. Proin facilisis finibus interdum. Fusce ac sollicitudin ipsum, eu varius risus. Aenean nec interdum lectus, sed vehicula mauris. Curabitur scelerisque turpis non arcu dapibus, vitae venenatis odio volutpat. Proin lobortis quis nibh vel euismod. Aenean semper malesuada varius. Morbi sit amet porta eros, at faucibus magna.</p>
                
                <p>Sed vitae maximus tellus. Cras dui nisi, rhoncus quis metus eget, suscipit ullamcorper odio. Donec tempus varius neque eget porttitor. Cras vel ultrices lectus. Vivamus a magna sed risus cursus faucibus in at nisi. Ut et justo lacus. Suspendisse quam metus, convallis eu est sit amet, fringilla aliquet nisl. Cras quam nisi, egestas et feugiat eget, lacinia eget mauris. Praesent sed mauris rutrum, lobortis nisl at, facilisis lacus. Integer quis molestie tellus. Phasellus sit amet posuere lectus, ac pretium nunc. Fusce pharetra rutrum mi, quis sodales felis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vivamus sed nulla turpis. Mauris porttitor urna quis augue semper porttitor.</p>
                
                <p>Maecenas ullamcorper viverra velit sit amet sodales. Mauris id diam hendrerit, varius mi consectetur, porta erat. In ut nisi quis velit feugiat ornare. Curabitur congue, ipsum in vehicula interdum, ipsum lorem finibus metus, et sagittis metus lectus at orci. Donec gravida odio a neque ultricies, at lacinia sem aliquam. In a odio arcu. Cras luctus sodales nulla ut efficitur. Phasellus ante massa, pellentesque a euismod sit amet, ultrices quis augue. Ut ipsum nisi, pulvinar id imperdiet nec, accumsan in dolor. Nulla laoreet tortor ut quam vehicula condimentum. Nunc iaculis ornare tellus, nec mollis massa dapibus ut. Donec sodales ipsum ac odio facilisis lobortis. Etiam non pulvinar erat, in semper est. Sed nec ligula eu mi mollis molestie at id mi. Fusce feugiat urna purus, eu lacinia libero tincidunt vitae. Mauris sed augue mattis, fermentum nibh at, aliquam libero.</p>
                
                <p>Cras nulla mi, viverra nec condimentum ac, dignissim at purus. Sed feugiat diam at nunc volutpat volutpat. Cras et sem ut risus pellentesque pharetra vitae a ligula. Morbi euismod ligula diam, eget pretium tortor convallis congue. Suspendisse cursus iaculis turpis a vulputate. Ut pellentesque, ante eu euismod commodo, eros justo efficitur arcu, at malesuada diam mi quis ante. Donec varius, nisi sit amet mollis imperdiet, sapien metus viverra dui, ut molestie tellus sem eu odio.</p>            
            '
        ]);
    }
}