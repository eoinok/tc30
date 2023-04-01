<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatememberimagesRequest;
use App\Http\Requests\UpdatememberimagesRequest;
use App\Repositories\memberimagesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class memberimagesController extends AppBaseController
{
    /** @var memberimagesRepository $memberimagesRepository*/
    private $memberimagesRepository;

    public function __construct(memberimagesRepository $memberimagesRepo)
    {
        $this->memberimagesRepository = $memberimagesRepo;
    }

    /**
     * Display a listing of the memberimages.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $memberimages = $this->memberimagesRepository->all();

        return view('memberimages.index')
            ->with('memberimages', $memberimages);
    }

    /**
     * Show the form for creating a new memberimages.
     *
     * @return Response
     */
    public function create($memberid)
    {
        return view('memberimages.create')->with('mid',$memberid);
    }

    /**
     * Store a newly created memberimages in storage.
     *
     * @param CreatememberimagesRequest $request
     *
     * @return Response
     */
    public function store(CreatememberimagesRequest $request)
    {
        if ($request->hasFile('imagefile')) {
            $files = $request->file('imagefile');
            $i=0;
            foreach ($files as $file) {
                $memberimage = new \App\Models\Memberimages();
                $memberimage->memberid = $request->memberid;
                $memberimage->imagefile = base64_encode(file_get_contents($file));
                $memberimage->description = $request->description[$i];
                if (!$memberimage->save()) {
                    Flash::error('Error - File not saved to the DB');
                }
                $i++;
            }
        }

        Flash::success('Memberimages saved successfully.');
        return redirect(route('memberimages.index'));
    }

    /**
     * Display the specified memberimages.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $memberimages = $this->memberimagesRepository->find($id);

        if (empty($memberimages)) {
            Flash::error('Memberimages not found');

            return redirect(route('memberimages.index'));
        }

        return view('memberimages.show')->with('memberimages', $memberimages);
    }

    /**
     * Show the form for editing the specified memberimages.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $memberimages = $this->memberimagesRepository->find($id);

        if (empty($memberimages)) {
            Flash::error('Memberimages not found');

            return redirect(route('memberimages.index'));
        }

        return view('memberimages.edit')->with('memberimages', $memberimages);
    }

    /**
     * Update the specified memberimages in storage.
     *
     * @param int $id
     * @param UpdatememberimagesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatememberimagesRequest $request)
    {
        $memberimages = $this->memberimagesRepository->find($id);

        if (empty($memberimages)) {
            Flash::error('Memberimages not found');

            return redirect(route('memberimages.index'));
        }

        $memberimages = $this->memberimagesRepository->update($request->all(), $id);

        Flash::success('Memberimages updated successfully.');

        return redirect(route('memberimages.index'));
    }

    /**
     * Remove the specified memberimages from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $memberimages = $this->memberimagesRepository->find($id);

        if (empty($memberimages)) {
            Flash::error('Memberimages not found');

            return redirect(route('memberimages.index'));
        }

        $this->memberimagesRepository->delete($id);

        Flash::success('Memberimages deleted successfully.');

        return redirect(route('memberimages.index'));
    }
}
