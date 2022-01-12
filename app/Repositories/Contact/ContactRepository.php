<?php
namespace App\Repositories\Contact;

use App\Repositories\BaseRepository;

class ContactRepository extends BaseRepository implements ContactRepositoryInterface
{
    public function getModel()
    {
        return \App\Contact::class;
    }

   
   
    
}