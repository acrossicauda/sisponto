<?php

namespace App\Http\Controllers;

use App\Models\Whatsapp;
use App\Http\Requests\StoreWhatsappRequest;
use App\Http\Requests\UpdateWhatsappRequest;
use Twilio\Rest\Client;

class WhatsappController extends Controller
{
    private string $sid;
    private string $__token;
    private string $phoneDefault;
    public function __construct()
    {
        $this->sid = env('TWILIO_ACCOUNT_SID');
        $this->__token = env('TWILIO_AUTH_TOKEN');
        $this->phoneDefault = env('TWILIO_PHONE');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    private function send(array $data): array
    {
        $phone = $data['phone']; //+5511
        if(strpos($phone, '+55') === false){
            $phone = '+55' . $phone;
        }
        $text = $data['message'];
        $sid    = $this->sid;
        $token  = $this->__token;
        $twilio = new Client($sid, $token);
        $message = $twilio->messages
            ->create("whatsapp:".$phone,
                array(
                    "from" => "whatsapp:".$this->phoneDefault,
                    //"contentSid" => "HXb5b62575e6e4ff6129ad7c8efe1f983e",
                    //"contentVariables" => "{"1":"12/1","2":"3pm"}",
                    "body" => $text
                )
            );


        $response = [
            'sid' => $message->sid,
            'success' => !$message->errorCode,
            'error_code' => $message->errorCode,
            'error_message' => $message->errorMessage,
            'messaging_service_sid' => $message->messagingServiceSid,
            'message_response' => json_encode($message),
            'from' => $message->from,
            'body' => $message->body,
            'api_version' => $message->apiVersion,
            'date_sent' => $message->dateSent,
            'date_created' => $message->dateCreated,
            'date_updated' => $message->dateUpdated,
            'uri' => $message->uri,
            'price' => $message->price,
            'price_unit' => $message->priceUnit,
        ];

        return $response;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWhatsappRequest $request)
    {
        $data = $request->validated();
        $response = $this->send($data);

        $dataInsert = [
            'phone' => $data['phone'],
            'message' => $data['message'],
            'send_status' => $response['success'],
            'is_send' => $response['success'],
            'json_whatsapp' => json_encode(['data' => $data, 'response' => $response]),
            'created_by' => auth()->id(),
            'updated_by' => auth()->id()
        ];

        $whatsapp = new Whatsapp($dataInsert);
        $whatsapp->save();
        redirect('whatsapp.show')->with('success', 'Mensagem enviada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Whatsapp $whatsapp)
    {
        $whatsapp = $whatsapp->paginate(50);
        return view('pages.whatsapp', compact('whatsapp'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Whatsapp $whatsapp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWhatsappRequest $request, Whatsapp $whatsapp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Whatsapp $whatsapp)
    {
        //
    }
}
