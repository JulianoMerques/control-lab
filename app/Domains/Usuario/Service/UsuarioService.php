<?php

namespace App\Domains\Usuario\Service;

use App\Domains\Usuario\Repositories\UsuarioRepository;
use App\Domains\Usuario\Validators\UsuarioValidator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class UsuarioService
{

    private $repository;

    private $validator;

    /**
     * UsuarioService constructor.
     * @param UsuarioRepository $repository
     * @param UsuarioValidator $validator
     */
    public function __construct(UsuarioRepository $repository, UsuarioValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;

    }

    /**
     * @param array $data
     * @return array|mixed
     */
    public function store($data)
    {
        if(isset($data['password'])){
            $data['password'] = bcrypt($data['password']);
        }
//        dd($data['img']);
        try {


            if (array_key_exists('img',$data)){
                //Verifica Extensão do Arquivo | Permitido .txt
                $extension = $data['img']->getClientOriginalExtension();

                if($extension != 'jpg'){
                    $message = 'error|Formato de arquivo não permitido. Permitido Apenas .jpg, .png!';
                    return Redirect::route('usuarios')->withMessage($message);
                }
            }

            //Validação de dados
            $this->validator->with( $data )->passesOrFail( ValidatorInterface::RULE_CREATE );

            // Inserir dados no banco (Novo Layout)
            $createUser = $this->repository->create( $data );
            if( !$createUser ) {
                $message = 'error|Erro ao cadastrar Usuário. Tente novamente.';
                return Redirect::route('usuarios')->withMessage($message);
            }else{
                if (array_key_exists('img',$data)){
                    $pathArquivos = '/app/user/img';
                    $file = $createUser->id.'.'.$extension;
                    $upload = $data['img']->move(public_path().$pathArquivos, $file);
                    if(!$upload){
                        $message = 'error|Não foi possível fazer upload de foto de Usuario. Tente novamente!';
                        return Redirect::route('usuarios')->withMessage($message);
                    }

                    //Atualizar banco de dados
                    $update = $this->repository->update(['img' => $pathArquivos.'/'.$file], $createUser->id);
                    if(!$update){
                        $message = 'error|Não foi atualizar o campo imagem do usuário. Tente novamente!';
                        return Redirect::route('usuarios')->withMessage($message);
                    }
                    $message = 'success|Usuário Cadastrado com Secesso.';
                    return Redirect::route('usuarios')->withMessage($message);
                }else{
                    $message = 'error|Imagem não enviada.';
                    return Redirect::route('usuarios')->withMessage($message);
                }
            }
        } catch (ValidatorException $e) {
            return Redirect::back()->withInput()->withErrors($e->getMessageBag());
        }
    }


    public function update($data, $id){
        if(isset($data['password'])){
            $data['password'] = bcrypt($data['password']);
        }
//        dd($data);
        try{

            if (array_key_exists('img',$data)){
                //Verifica Extensão do Arquivo | Permitido .txt
                $extension = $data['img']->getClientOriginalExtension();

                if($extension != 'jpg'){
                    $message = 'error|Formato de arquivo não permitido. Permitido Apenas .jpg, .png!';
                    return Redirect::route('usuarios')->withMessage($message);
                }
            }
            //            Validação de dados
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE );

            $updateUSer = $this->repository->update( $data,$id);
            if( !$updateUSer ) {
                $message = 'error|Erro ao cadastrar Usuário. Tente novamente.';
                return Redirect::route('usuarios')->withMessage($message);
            }else{
                if (array_key_exists('img',$data)){
                    $pathArquivos = '/app/user/img';
                    $file = $updateUSer->id.'.'.$extension;

                    $dir = public_path() . $pathArquivos.'/'.$file;
                    if(file_exists($dir)){
                        //Deleta Foto do usuário
                        Storage::delete($dir);
                    }

                    $upload = $data['img']->move(public_path().$pathArquivos, $file);
                    if(!$upload){
                        $message = 'error|Não foi possível fazer upload de foto de Usuario. Tente novamente!';
                        return Redirect::route('usuarios')->withMessage($message);
                    }
                    //Atualizar banco de dados
                    $update = $this->repository->update(['img' => $pathArquivos.'/'.$file], $updateUSer->id);
                    if(!$update){
                        $message = 'error|Não foi atualizar o campo imagem do usuário. Tente novamente!';
                        return Redirect::route('usuarios')->withMessage($message);
                    }
                }else{
                    $message = 'error|Nenhuma Imagem Enviada.';
                    return Redirect::route('usuarios.show',$id)->withMessage($message);
                }
                $message = 'success|Usuário Atualizado com Secesso.';
                return Redirect::route('usuarios.show',$id)->withMessage($message);
            }

        }catch (ValidatorException $e) {
            return Redirect::back()->withInput()->withErrors($e->getMessageBag());
        }
    }



    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id){
        if (!$this->repository->delete($id)){
            $message = 'error|Erro ao Deletar Usuário. Tente novamente.';
        }else{
            $message = 'success|Usuário Deletado com Secesso.';
        }
        return Redirect::route('usuarios')->withMessage($message);

    }

    /**
     * @param $message String
     * @param $opts array
     * @return \Illuminate\Http\JsonResponse
     */
    public function returnMessage($message, $opts, $status = 200){
        return response()->json([
            'message' => $message,
            'opts' => $opts
        ], $status);
    }


}