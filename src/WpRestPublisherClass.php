<?php

namespace Pforret\WpRestPublisher;

use Carbon\Carbon;
use Cocur\Slugify\Slugify;
use GuzzleHttp\Client;
use Vnn\WpApiClient\Auth\WpBasicAuth;
use Vnn\WpApiClient\Http\GuzzleAdapter;
use Vnn\WpApiClient\WpClient;

class WpRestPublisherClass
{
    /**
     * @var WpClient
     */
    private WpClient $client;
    private array $user_id;

    public function __construct(string $wp_url, string $user, string $password)
    {
        $this->client = new WpClient(new GuzzleAdapter(new Client()), $wp_url);
        $this->client->setCredentials(new WpBasicAuth($user, $password));
        // TODO: check if login went OK
        $this->user_id = $this->client->users()->get();
    }

    public function createPost(string $title, string $html, string $date = null, $categories = [], $tags = [], string $featuredImagePath = '', string $postType = 'post', string $status = 'publish')
    {
        // https://developer.wordpress.org/rest-api/reference/posts/#create-a-post
        /*
         *  date	The date the object was published, in the site's timezone.
            date_gmt	The date the object was published, as GMT.
            slug	An alphanumeric identifier for the object unique to its type.
            status	A named status for the object.
            One of: publish, future, draft, pending, private
            password	A password to protect access to the content and excerpt.
            title	The title for the object.
            content	The content for the object.
            author	The ID for the author of the object.
            excerpt	The excerpt for the object.
            featured_media	The ID of the featured media for the object.
            comment_status	Whether or not comments are open on the object.
            One of: open, closed
            ping_status	Whether or not the object can be pinged.
            One of: open, closed
            format	The format for the object.
            One of: standard, aside, chat, gallery, link, image, quote, status, video, audio
            meta	Meta fields.
            sticky	Whether or not the object should be treated as sticky.
            template	The theme file to use to display the object.
            categories	The terms assigned to the object in the category taxonomy.
            tags	The terms assigned to the object in the post_tag taxonomy.
         */
        $slugify = new Slugify();
        $data = [
            'date' => Carbon::createFromTimeString($date ?? 'now')->toDateString(),
            'slug' => $slugify->slugify($title),
            'status' => $status,
            'title' => $title,
            'content' => $html,
            'author' => $this->user_id,
            'categories' => $categories,
            'tags' => $tags,
        ];
        $this->client->posts()->save($data);
    }
}
