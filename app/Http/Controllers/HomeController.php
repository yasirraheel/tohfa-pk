<?php

namespace App\Http\Controllers;

use DB;
use Lang;
use Mail;
use App\Models\User;
use App\Models\Plans;
use App\Models\Query;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\AdminSettings;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;


class HomeController extends Controller
{
  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    try {
      // Check Datebase access
      AdminSettings::select('id')->first();
    } catch (\Exception $e) {
      // Redirect to Installer
      return redirect('installer/script');
    }

    $categories = Categories::select(['name', 'slug', 'thumbnail'])->where('mode', 'on')->orderBy('name')->simplePaginate(4);

    // Simplified for universal starter kit - just get top categories
    $popularCategories = Categories::where('mode', 'on')->take(5)->get();

    if ($popularCategories->count() != 0) {
      $popularCategorieArray = [];
      foreach ($popularCategories as $popularCategorie) {
        $categoryName = Lang::has('categories.' . $popularCategorie->slug) ? __('categories.' . $popularCategorie->slug) : $popularCategorie->name;

        $popularCategorieArray[]  = '<a style="color:#FFF;" href="' . url('category', $popularCategorie->slug) . '">' . $categoryName . '</a>';
      }
      $categoryPopular = implode(', ', $popularCategorieArray);
    } else {
      $categoryPopular = false;
    }

    return view(
      'index.home',
      [
        'categories' => $categories,
        'categoryPopular' => $categoryPopular
      ]
    );
  }

  public function getVerifyAccount($confirmation_code)
  {
    if (
      Auth::guest()
      || Auth::check()
      && Auth::user()->activation_code == $confirmation_code
      && Auth::user()->status == 'pending'
    ) {
      $user = User::where('activation_code', $confirmation_code)->where('status', 'pending')->first();

      if ($user) {

        $update = User::where('activation_code', $confirmation_code)
          ->where('status', 'pending')
          ->update(array('status' => 'active', 'activation_code' => ''));


        Auth::loginUsingId($user->id);

        return redirect('/')
          ->with([
            'success_verify' => true,
          ]);
      } else {
        return redirect('/')
          ->with([
            'error_verify' => true,
          ]);
      }
    } else {
      return redirect('/');
    }
  }

  public function getSearch()
  {
    $q = request()->get('q');
    // Universal starter kit - customize this for your content type
    $results = collect([]);

    //<--- * If $q is empty or is minus to 1 * ---->
    if ($q == '' || strlen($q) <= 2) {
      return redirect('/');
    }

    return view('default.search')->with(['results' => $results, 'query' => $q]);
  }

  public function members()
  {
    $users = Query::users();

    if (request()->ajax()) {
      return view('includes.users')->withUsers($users)->render();
    }

    return view('default.members')->withUsers($users);
  }

  public function premium()
  {
    // Redirect to pricing page for universal starter kit
    return redirect('pricing');
  }

  public function latest()
  {
    // Universal starter kit - redirect to home or customize for your content
    return redirect('/');
  }

  public function featured()
  {
    // Universal starter kit - redirect to home or customize for your content
    return redirect('/');
  }


  public function popular()
  {
    // Universal starter kit - redirect to home or customize for your content
    return redirect('/');
  }

  public function commented()
  {
    // Universal starter kit - redirect to home or customize for your content
    return redirect('/');
  }

  public function viewed()
  {
    // Universal starter kit - redirect to home or customize for your content
    return redirect('/');
  }

  public function downloads()
  {
    // Universal starter kit - redirect to home or customize for your content
    return redirect('/');
  }

  public function categories()
  {
    $categories = Categories::whereMode('on')->orderBy('name')->get();
    return view('default.categories')->withCategories($categories);
  }

  public function category($slug)
  {
    // Get category info
    $category = Categories::where('slug', $slug)->where('mode', 'on')->firstOrFail();
    
    return view('default.category')->with([
      'category' => $category,
      'items' => collect([]) // Empty for now - add your content here
    ]);
  }

  public function subcategory($slug, $subcategory)
  {
    // Universal starter kit - customize for your content
    return redirect('category/' . $slug);
  }

  public function cameras($slug)
  {
    // Not applicable for universal starter kit
    abort(404);
  }

  public function colors($slug)
  {
    // Not applicable for universal starter kit
    abort(404);
  }

  public function collections(Request $request)
  {
    $title = __('misc.collections') . ' - ';

    // Removed for universal starter kit - return empty paginated collection
    $data = new \Illuminate\Pagination\LengthAwarePaginator([], 0, 15, 1, [
      'path' => request()->url(),
    ]);

    if ($request->input('page') > $data->lastPage()) {
      abort('404');
    }

    if (request()->ajax()) {
      return view('includes.collections-grid', ['data' => $data])->render();
    }

    return view('default.collections', ['title' => $title, 'data' => $data]);
  } //<--- End Method

  public function contact()
  {
    return view('default.contact');
  }

  public function contactStore(Request $request)
  {
    $input = $request->all();

    $errorMessages = [
      'g-recaptcha-response.required' => 'reCAPTCHA Error',
      'g-recaptcha-response.captcha' => 'reCAPTCHA Error',
    ];

    $validator = Validator::make($input, [
      'full_name' => 'min:3|max:25',
      'email'     => 'required|email',
      'subject'     => 'required',
      'message' => 'min:10|required',
      'g-recaptcha-response' => 'required|captcha'
    ], $errorMessages);

    if ($validator->fails()) {
      return redirect('contact')
        ->withInput()->withErrors($validator);
    }

    // SEND EMAIL TO SUPPORT
    $fullname    = $input['full_name'];
    $email_user  = $input['email'];
    $title_site  = config('settings.title');
    $subject     = $input['subject'];
    $email_reply = config('settings.email_admin');

    Mail::send(
      'emails.contact-email',
      array(
        'full_name' => $input['full_name'],
        'email' => $input['email'],
        'subject' => $input['subject'],
        '_message' => $input['message'],
        'ip' => request()->ip(),
      ),
      function ($message) use (
        $fullname,
        $email_user,
        $title_site,
        $email_reply,
        $subject
      ) {
        $message->from($email_reply, $fullname);
        $message->subject(__('misc.message') . ' - ' . $subject . ' - ' . $email_user);
        $message->to($email_reply, $title_site);
        $message->replyTo($email_user);
      }
    );

    return redirect('contact')->with(['notification' => __('misc.send_contact_success')]);
  }

  public function pricing()
  {
    $plans = Plans::whereStatus('1');

    if ($plans->count() == 0 || config('settings.sell_option') == 'off') {
      abort(404);
    }

    return view('default.pricing')->with([
      'plans' => $plans,
      'getSubscription' => auth()->check() ? auth()->user()->getSubscription() : null
    ]);
  }

  public function tags()
  {
    // Removed for universal starter kit - return empty data
    $data = collect([]);
    return view('default.tags')->withData($data);
  }

  public function tagsShow($slug)
  {
    // Universal starter kit - customize for your content tags
    return redirect('/');
  }

  public function vectors()
  {
    // Not applicable for universal starter kit
    abort(404);
  }
}
