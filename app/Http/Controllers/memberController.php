<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatememberRequest;
use App\Http\Requests\UpdatememberRequest;
use App\Repositories\memberRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class memberController extends AppBaseController
{
    /** @var memberRepository $memberRepository*/
    private $memberRepository;

    public function search(Request $request)
    {
        $output="";
        if($request->ajax()) {       
            $members=\App\Models\member::where('surname','LIKE','%'.$request->search."%")->get();
            if($members->count()>0) {
                foreach ($members as $member) {
                    $output='<tr>';
                    $output=$output . '<td>'.$member->id.'</td>';
                    $output=$output . '<td>'.$member->firstname.'</td>';
                    $output=$output . '<td>'.$member->surname.'</td>';
                    $output=$output . '<td>'.$member->membertype.'</td>';
                    $output=$output . '</tr>'; 
                }
                return Response($output);
            }
            return Response("No Match");
        }
        else {
            return Response("error");
        } 
    }
    
    public function searchform()
    {
        return view('members.search');
    }
    
    public function __construct(memberRepository $memberRepo)
    {
        $this->memberRepository = $memberRepo;
    }

    /**
     * Display a listing of the member.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        //$members=\App\Models\member::where('firstname','LIKE','%b%')->get();
        $members = $this->memberRepository->all();

        return view('members.index')
            ->with('members', $members);
    }

    /**
     * Show the form for creating a new member.
     *
     * @return Response
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created member in storage.
     *
     * @param CreatememberRequest $request
     *
     * @return Response
     */
    public function store(CreatememberRequest $request)
    {
        $input = $request->all();

        $member = $this->memberRepository->create($input);

        Flash::success('Member saved successfully.');

        return redirect(route('members.index'));
    }

    /**
     * Display the specified member.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $member = $this->memberRepository->find($id);
        $memberimages = $member->memberimages;

        if (empty($member)) {
            Flash::error('Member not found');

            return redirect(route('members.index'));
        }

        return view('members.show')->with('member', $member)->with('memberimages',$memberimages);;
    }

    /**
     * Show the form for editing the specified member.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $member = $this->memberRepository->find($id);

        if (empty($member)) {
            Flash::error('Member not found');

            return redirect(route('members.index'));
        }

        return view('members.edit')->with('member', $member);
    }

    /**
     * Update the specified member in storage.
     *
     * @param int $id
     * @param UpdatememberRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatememberRequest $request)
    {
        $member = $this->memberRepository->find($id);

        if (empty($member)) {
            Flash::error('Member not found');

            return redirect(route('members.index'));
        }

        $member = $this->memberRepository->update($request->all(), $id);

        Flash::success('Member updated successfully.');

        return redirect(route('members.index'));
    }

    /**
     * Remove the specified member from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $member = $this->memberRepository->find($id);

        if (empty($member)) {
            Flash::error('Member not found');

            return redirect(route('members.index'));
        }

        $this->memberRepository->delete($id);

        Flash::success('Member deleted successfully.');

        return redirect(route('members.index'));
    }
}
