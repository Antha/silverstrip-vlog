<?php
namespace {

    use SilverStripe\CMS\Controllers\ContentController;
    use SilverStripe\Security\Security;

    /**
     * @template T of Page
     * @extends ContentController<T>
     */
    class PageController extends ContentController
    {
        /**
         * An array of actions that can be accessed via a request. Each array element should be an action name, and the
         * permissions or conditions required to allow the user to access it.
         *
         * <code>
         * [
         *     'action', // anyone can access this action
         *     'action' => true, // same as above
         *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
         *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
         * ];
         * </code>
         *
         * @var array
         */
        private static $allowed_actions = [];

        protected function init()
        {
            parent::init();
            // You can include any CSS or JS required by your project here.
            // See: https://docs.silverstripe.org/en/developer_guides/templates/requirements/
        }

        public function CurrentUserName() {
            $member = Security::getCurrentUser();
            return $member ? $member->getName() : null;
            // return "Miss";
        }

        public function CurrentUserID() {
            $member = Security::getCurrentUser();
            return $member ? $member->ID : null;
            // return "Miss";
        }
  
        public function ProductObjects() {
            return ProductObjects::get();
        }

        public function CategoryObjects() {
            return CategoryObjects::get();
        }

        public function WishlistObjects() {
            $member = Security::getCurrentUser();
            if (!$member) {
                return OrderObjects::get()->filter('ID', 0); // kosongkan kalau tidak login
            }

            return OrderObjects::get()
                ->filter('UserID', $member->ID)
                ->filter('Status', "wishlist")
                ->sort('DateTime', 'DESC');
        }

        public function CheckoutObjects() {
            $member = Security::getCurrentUser();
            if (!$member) {
                return OrderObjects::get()->filter('ID', 0); // kosongkan kalau tidak login
            }

            return OrderObjects::get()
                ->filter('UserID', $member->ID)
                ->filter('Status', "checkout")
                ->sort('DateTime', 'DESC');
        }

        public function InProgressObjects() {
            $member = Security::getCurrentUser();
            if (!$member) {
                return OrderObjects::get()->filter('ID', 0); // kosongkan kalau tidak login
            }

            return OrderObjects::get()
                ->filter('UserID', $member->ID)
                ->filter('Status', "inprogress")
                ->sort('DateTime', 'DESC');
        }

        public function SendingObjects() {
            $member = Security::getCurrentUser();
            if (!$member) {
                return OrderObjects::get()->filter('ID', 0); // kosongkan kalau tidak login
            }

            return OrderObjects::get()
                ->filter('UserID', $member->ID)
                ->filter('Status', "sending")
                ->sort('DateTime', 'DESC');
        }

        public function DeliveredObjects() {
            $member = Security::getCurrentUser();
            if (!$member) {
                return OrderObjects::get()->filter('ID', 0); // kosongkan kalau tidak login
            }

            return OrderObjects::get()
                ->filter('UserID', $member->ID)
                ->filter('Status', "delivered")
                ->sort('DateTime', 'DESC');
        }
    }
}
